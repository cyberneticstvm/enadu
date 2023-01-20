<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Address;

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
        echo session()->forget('cart');
        return redirect()->back()->with('success', 'Your order has been placed successfully!');
    }
}
