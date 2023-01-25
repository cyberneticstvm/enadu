<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Feedback;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
}
