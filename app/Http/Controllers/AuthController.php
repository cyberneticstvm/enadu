<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Carbon\Carbon;
use Hash;
use Session;
use DB;
use Config;

class AuthController extends Controller
{
    public function register(){
        if(Auth::user()):
            return redirect()->route('account');
        else:
            return view('signup');
        endif;
    }

    public function otp(){

    }

    public function signup(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'password' => 'required|confirmed|min:6',
        ]);
        $input = $request->all();
        $input['user_type'] = 'user';
        $input['email'] = $request->mobile;
        $input['password'] = Hash::make($request->password);
        $user = User::create($input); $type = 'login';
        //Auth::login($user);
        //return redirect()->route('login')->with('success','User Registered successfully');
        $this->generateOtp($user);
        return view('verification', compact('user', 'type'));
    }

    public function generateOtp($user){
        $user = User::find($user->id);
        $otp = random_int(1000, 9999);
        User::where('id', $user->id)->update(['otp' => $otp]);
        $msg = urlencode("Use $otp to verify your mobile number with GeeBin. In case you did not enter your number on our APP, Please ignore this message.");
        $port = Config::get('app.sms.port');
        $api_id = Config::get('app.sms.api_id');
        $sender_id = Config::get('app.sms.sender_id');
        $dlt_id = Config::get('app.sms.dlt_id');
        $template_id = Config::get('app.sms.template_id');
        $mobile = $user->mobile;
        $url = "http://sms.liexa.in/api/web?id=$api_id&senderid=$sender_id&to=$mobile&msg=$msg&port=$port&dltid=$dlt_id&tempid=$template_id";
        $data = $this->sendSMS($url);
    }
    
    public function sendSMS($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close ($ch);
        return json_decode($response, true);
    }

    public function forgot(){
        return view('forgot-password');
    }

    public function changepwd1(){
        return view('change-password');
    }

    public function forgotpwd(Request $request){
        $this->validate($request, [
            'mobile' => 'required|numeric|digits:10',
        ]);
        $user = User::where('mobile', $request->mobile)->first();
        if($user):
            $this->generateOtp($user);
            $type = 'forgot';
            return view('verification', compact('user', 'type'));
        else:
            return redirect()->back()->with("error", "Provided mobile number is not found in the records.")->withInput($request->all());
        endif;
    }

    public function otpcheck(Request $request){        
        $this->validate($request, [
            'val1' => 'required',
            'val2' => 'required',
            'val3' => 'required',
            'val4' => 'required',
        ]);
        $otp = $request->val1.$request->val2.$request->val3.$request->val4;        
        $u = User::where('id', $request->user_id)->where('otp', $otp)->get()->first();
        if(empty($u)):
            return redirect()->back()->with("error", "Something went wrong. Please try again.")->withInput($request->all());
        else:
            if($request->type == 'login'):
                $upd = User::where('id', $u->id)->update(['otp_verified_at' => Carbon::now()]);
                return redirect()->route('login')->with('success','OTP verified successfully');
            else:
                return redirect()->route('changepwd1')->with(['success' => 'OTP verified successfully', 'user' => $u]);
            endif;
        endif;
    }

    public function changepwd(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $pwd = Hash::make($request->password);
        $upd = User::where('id', $request->user_id)->update(['password' => $pwd]);
        return redirect()->route('login')->with('success','Password changed successfully');
    }

    public function login(){
        if(Auth::user()):
            return redirect()->route('account');
        else:
            return view('login');
        endif;
    }

    public function adminlogin(){
        if(Auth::user()):
            return redirect()->route('admin.dash');
        else:
            return view('admin.login');
        endif;
    }

    public function loginn(Request $request){
        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('mobile', 'password');
        if(!Auth::validate($credentials)):
            return back()->with('error','Your mobile and password combination is wrong.')->withInput($request->all());
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        if(empty($user->otp_verified_at)):
            $this->generateOtp($user);
            $type = 'login';
            return view('verification', compact('user', 'type'));
        endif;
        Auth::login($user, $request->get('remember'));
        if(Auth::user()->user_type == 'user'):
            $addr = Address::where('user', Auth::user()->id)->get();
            if($addr->isEmpty()):
                return redirect()->route('account')->with('success','User logged in successfully');                
            else:
                return redirect()->route('account')->with('success','User logged in successfully');
            endif;
        endif;
        if(Auth::user()->user_type == 'admin')
            return redirect()->route('admin.dash')->with('success','User logged in successfully');
        if(Auth::user()->user_type == 'staff')
            return redirect()->route('staff.dash')->with('success','User logged in successfully');
    }

    public function logout(){
        if(Auth::user()):
            $utype = Auth::user()->user_type;
            Session::flush();
            Auth::logout();
            if($utype == 'admin') :
                return redirect()->route('home')
                            ->with('success','User logged out successfully');
            else:
                return redirect()->route('login')
                            ->with('success','User logged out successfully');
            endif;
        else:
            return redirect()->route('login')
                            ->with('success','User logged out successfully');
        endif;
    }

    public function account(){
        return view('account');
    }
}
