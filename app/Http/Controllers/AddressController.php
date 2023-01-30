<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user', Auth::user()->id)->get();
        return view('address', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'contact_name' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'pincode' => 'required|numeric',
            'landmark' => 'required',
            'district' => 'required',
        ]);
        $input = $request->all();
        $input['user'] = Auth::user()->id;
        $address = Address::create($input);
        if($request->type == 'cart'):
            return redirect()->route('cart')->with('success','Address added successfully');
        elseif($request->type == 'service'):
            return redirect()->route('service')->with('success','Address added successfully')->withInput($request->all());
        else:
            return redirect()->route('address')->with('success','Address added successfully');
        endif;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::find($id)->delete();
        return redirect()->route('address')->with('success','Address deleted successfully');
    }
}
