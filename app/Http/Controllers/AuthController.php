<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Session;
use DB;


class AuthController extends Controller
{
    public function register(){
        if(Auth::user()):
            return redirect()->route('account');
        else:
            return view('signup');
        endif;
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
        $user = User::create($input);
        //Auth::login($user);
        return redirect()->route('login')
                        ->with('success','User Registered successfully');
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
        Auth::login($user, $request->get('remember'));
        if(Auth::user()->user_type == 'user')
            return redirect()->route('account')->with('success','User logged in successfully');
        if(Auth::user()->user_type == 'admin')
            return redirect()->route('admin.dash')->with('success','User logged in successfully');
        if(Auth::user()->user_type == 'staff')
            return redirect()->route('staff.dash')->with('success','User logged in successfully');
    }

    public function logout(){
        Session::flush();
        Auth::logout();  
        return redirect()->route('login')
                        ->with('success','User logged out successfully');
    }

    public function account(){
        return view('account');
    }
}
