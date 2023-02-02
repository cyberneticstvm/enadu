<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Service;
use Hash;
use DB;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile(){
        $profile = User::find(Auth::user()->id);
        return view('profile', compact('profile'));
    }

    public function index()
    {
        $users = User::where('user_type', 'staff')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'password' => 'required|min:6',
        ]);
        $input = $request->all();
        $input['user_type'] = 'staff';
        $input['email'] = $request->mobile;
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        //Auth::login($user);
        return redirect()->route('admin.staff')
                        ->with('success','User Registered successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $ostatus = DB::table('order_status')->where('id', $order->order_status)->value('name');
        $ostaff = DB::table('staff_orders')->where('order_id', $order->id)->first();
        $milestones = DB::table('mile_stones as m')->leftJoin('order_status as s', 'm.order_status', '=', 's.id')->where('order_id', $order->id)->get();
        return view('milestone', compact('order', 'ostatus', 'ostaff', 'milestones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileupdate(Request $request, $id){
        $profile = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,'.$id,
        ]);
        $input = $request->all();
        $input['password'] = ($request->password) ? Hash::make($request->password) : $profile->getOriginal('password');
        $profile->update($input);
        return redirect()->route('profile')
                        ->with('success','Profile Updated successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return redirect()->route('profile')
                        ->with('success','Profile Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,'.$id,
        ]);
        $input = $request->all();
        $user = User::find($id);
        $input['user_type'] = 'staff';
        $input['email'] = $request->mobile;
        $input['password'] = ($request->password) ? Hash::make($request->password) : $user->getOriginal('password');        
        $user->update($input);
        return redirect()->route('admin.staff')
                        ->with('success','User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.staff')->with('success','User deleted successfully');
    }

    public function order(){
        $orders = Order::where('user', Auth::user()->id)->orderByDesc('created_at')->get();
        return view('orders', compact('orders'));
    }

    public function feedback(){
        $feedbacks = Feedback::where('user_id', Auth::user()->id)->get();
        return view('feedback', compact('feedbacks'));
    }
    
    public function savefeedback(Request $request){
        $this->validate($request, [
            'feedback_category' => 'required',
            'comment' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['comment_id'] = 0;
        Feedback::create($input);
        return redirect()->route('feedback')->with('success','Feedback submitted successfully');
    }

    public function service(){
        $addresses = Address::where('user', Auth::user()->id)->get();
        $products = Product::where('available_for_service', 'Y')->get();
        $districts = DB::table('districts')->orderBy('name')->get();
        return view('service', compact('addresses', 'products', 'districts'));
    }

    public function saveservice(Request $request){
        $this->validate($request, [
            'product' => 'required',
            'ptype' => 'required',
            'address' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        Service::create($input);
        return redirect()->route('service')->with('success','Service request submitted successfully');
    }

    public function localbody($district){
        $op = "";
        $corps = DB::table('corporations')->where('district', $district)->orderBy('name')->get();
        $munis = DB::table('municipalities')->where('district', $district)->orderBy('name')->get();
        $pans = DB::table('grama_panchayats')->where('district', $district)->orderBy('name')->get();
        $op .= "<option value=''>Select</option>";
        $op .= "<optgroup label='Corporation' id='corp'>";
            foreach($corps as $key => $corp):
                $op .= "<option value='".$corp->id."'>".$corp->name."</option>";
            endforeach;
        $op .= "</optgroup>";
        $op .= "<optgroup label='Municipalities' id='mun'>";
            foreach($munis as $key => $mun):
                $op .= "<option value='".$mun->id."'>".$mun->name."</option>";
            endforeach;
        $op .= "</optgroup>";
        $op .= "<optgroup label='Grama Panchayats' id='pan'>";
            foreach($pans as $key => $pan):
                $op .= "<option value='".$pan->id."'>".$pan->name."</option>";
            endforeach;
        $op .= "</optgroup>";
        echo $op;
    }
}
