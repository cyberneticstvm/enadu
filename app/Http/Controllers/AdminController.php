<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\StaffOrder;
use App\Models\Feedback;
use DB;

class AdminController extends Controller
{
    public function dash(){
        return view('admin.dash');
    }    

    public function staffdash(){
        return view('staff.dash');
    }

    public function order(){
        $orders = Order::leftJoin('order_status as os', 'orders.order_status', '=', 'os.id')->selectRaw("orders.id, orders.amount, orders.created_at, os.name")->where('order_status', '!=', 5)->orderByDesc('created_at')->get();
        return view('admin.order', compact('orders'));
    }

    public function orderdetails($id){
        $order = Order::find($id);
        $status = DB::table('order_status')->get();
        $staffs = DB::table('users')->where('user_type', 'staff')->get();
        $staff_order = DB::table('staff_orders')->where('order_id', $id)->first();
        return view('admin.order-details', compact('order', 'status', 'staffs', 'staff_order'));
    }

    public function assignorder(Request $request){
        $this->validate($request, [
            'delivery_person' => 'required',
            'order_status' => 'required',
        ]);
        $input = $request->except(array('_token', 'delivery_person'));
        $input['user_id'] = $request->delivery_person;
        StaffOrder::upsert($input, 'order_id');
        Order::where('id', $request->order_id)->update(['order_status' => $request->order_status]);
        return redirect()->route('admin.order')->with('success','Order updated successfully');
    }

    public function feedback(){
        $feedbacks = Feedback::where('comment_id', 0)->groupBy('user_id')->orderByDesc('id')->get();
        return view('admin.feedback',  compact('feedbacks'));
    }

    public function showcomment($id){
        $comment = Feedback::find($id);
        return view('admin.reply', compact('comment'));
    }

    public function replycomment(Request $request){
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Feedback::create($input);
        return redirect()->route('admin.feedback')->with('success','Reply submitted successfully');
    }
}
