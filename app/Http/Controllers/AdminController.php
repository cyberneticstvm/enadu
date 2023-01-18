<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dash(){
        return view('admin.dash');
    }    

    public function staffdash(){
        return view('staff.dash');
    }

    public function order(){
        return view('admin.order');
    }
}
