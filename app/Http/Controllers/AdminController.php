<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\StaffOrder;
use App\Models\Feedback;
use App\Models\MileStone;
use App\Models\Meeting;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    public function dash(){
        return view('admin.dash');
    }    

    public function staffdash(){
        return view('staff.dash');
    }

    public function stafforders(){
        $orders = StaffOrder::leftJoin('orders as o', 'o.id', '=', 'staff_orders.order_id')->leftJoin('addresses as a', 'a.user', '=', 'o.user')->where('user_id', Auth::user()->id)->whereIn('o.order_status', [1,2,3,4])->selectRaw("o.id as oid, o.amount, o.payment_type, a.*")->groupBy('o.id')->get();
        return view('staff.orders', compact('orders'));
    }

    public function staffmeetings(){
        $meetings = Meeting::whereDate('created_at', Carbon::today())->get();
        return view('staff.meetings', compact('meetings'));
    }

    public function savestaffmeetings(Request $request){
        $this->validate($request, [
            'customer_name' => 'required',
            'mobile' => 'required',
            'customer_address' => 'required',
            'location' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $last_location = Meeting::whereDate('created_at', Carbon::today())->whereNotNull('location')->orderByDesc('id')->first();
        if($last_location):
            $input['distance'] = $this->GetDistance($last_location->latitude, $last_location->longitude, $request->latitude, $request->longitude)['distance'];
        else:
            $input['distance'] = 0;
        endif;
        Meeting::create($input);
        return redirect()->route('staff.meetings')->with('success','Customer updated successfully');
    }

    public function GetDistance($lat1, $lng1, $lat2, $lng2){
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$lat1.",".$lng1."&destinations=".$lat2.",".$lng2."&mode=driving&key=".config('app.google_api_key');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        return array('distance' => $dist/1000, 'time' => $time);
    }

    public function delivery($id){
        $order = Order::find($id);
        $status = DB::table('order_status')->get();
        return view('staff.delivery', compact('order', 'status'));
    }

    public function updatedelivery(Request $request){
        $this->validate($request, [
            'comments' => 'required',
            'order_status' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        MileStone::create($input);
        Order::where('id', $request->order_id)->update(['order_status' => $request->order_status]);
        StaffOrder::where('order_id', $request->order_id)->update(['order_status' => $request->order_status]);
        return redirect()->route('staff.dash')->with('success','Order updated successfully');
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
