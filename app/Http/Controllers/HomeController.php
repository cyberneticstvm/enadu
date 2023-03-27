<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    public function privacy(){
        return view('privacy');
    }

    public function geebinapp(){
        $products = Product::where('status', 1)->get();
        if(Auth::user()):
            //return redirect()->route('account');
            if(Auth::user()->user_type == 'user'):
                return view('account', compact('products'));
            endif;
            if(Auth::user()->user_type == 'admin'):
                return view('admin.dash');
            endif;
            if(Auth::user()->user_type == 'staff'):
                return view('staff.dash');
            endif;
        else:
            return view('index');
        endif;
    }

    public function products(){
        $products = Product::where('status', 1)->get();
        return view('home', compact('products'));
    }
}
