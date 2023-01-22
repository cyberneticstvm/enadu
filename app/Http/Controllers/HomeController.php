<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    public function home(){
        $products = Product::where('status', 1)->get();
        if(Auth::user()):
            //return redirect()->route('account');
            if(Auth::user()->user_type == 'user'):
                return view('home', compact('products'));
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
}