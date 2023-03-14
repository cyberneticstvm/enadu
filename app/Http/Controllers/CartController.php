<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;
use DB;

class CartController extends Controller
{
    public function cart(){
        $addresses = (Auth::user()) ? Address::where('user', Auth::user()->id)->get() : [];
        return view('cart', compact('addresses'));
    }

    public function addtocart(Request $request){
        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $request->qty;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "qty" => $request->qty,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updatecart(Request $request){
        if($request->pdct && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->pdct]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function deletecart(Request $request){
        if($request->pdct) {
            $cart = session()->get('cart');
            if(isset($cart[$request->pdct])){
                unset($cart[$request->pdct]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request){
        $request->validate([
            'address' => 'required',
        ]);
        //echo session()->getId();
        if($request->ptype == 'cod'):
            return redirect()->route('thankyou');
        else:
            $key = Config::get('myconfig.instamojo.key'); $token = Config::get('myconfig.instamojo.token'); $url = Config::get('myconfig.instamojo.payment_url'); $redirect_url = Config::get('myconfig.instamojo.redirect_url');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);     
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Api-Key:$key", "X-Auth-Token:$token"));
            $payload = Array(
                'grant_type' => 'client_credentials',
                'client_id' => $key,
                'client_secret' => $token,
                'purpose' => $request->purpose,
                'amount' => $request->amount,
                'phone' => Auth::user()->addresses()->find($request->address)->mobile,
                'buyer_name' => $request->buyer_name,
                'redirect_url' => $redirect_url,
                'send_email' => false,
                'webhook' => '',
                'send_sms' => true,
                'email' => '',
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);
            $decode = json_decode($response);
            $success = $decode->success;
            if($success == true):
                $paymentURL = $decode->payment_request->longurl;
                redirect()->to($paymentURL)->send();
            else:
                return redirect()->back()->with('error', 'Something went wrong! Status Message: '.$decode->message);
            endif;
        endif;   
    }

    public function thankyou(Request $request){
        $cart = session()->get('cart'); $total = 0;
        foreach(session('cart') as $id => $product):
            $total += $product['price'] * $product['qty'];
        endforeach;
        $input['user'] = Auth::user()->id;        
        if(isset($request->payment_id)):
            $input['payment_id'] = $request->payment_id;
            $input['payment_request_id'] = $request->payment_request_id;
            $input['payment_status'] = $request->payment_status;
            $input['payment_type'] = 'instamojo';
        else:
            $input['payment_id'] = NULL;
            $input['payment_request_id'] = NULL;
            $input['payment_status'] = 'Pending';
            $input['payment_type'] = 'cod';                        
        endif;        
        $input['discount'] = 0;
        $input['amount'] = $total;
        try{
            $order = DB::transaction(function() use ($input, $cart) {
                $order = Order::create($input);
                foreach($cart as $id => $product):
                    $data[] = [
                        'order_id' => $order->id,
                        'product' => $id,
                        'qty' => $product['qty'],
                        'price' => $product['price'],
                        'total' => $product['qty']*$product['price'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];
                endforeach;
                $order_details = DB::table('order_details')->insert($data);
                return $order;
            });            
            session()->forget('cart');
            return view('thankyou', compact('order'));
        }catch(Exception $e){
            throw $e;
        }
        
    }
}
