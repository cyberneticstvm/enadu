<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchise;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franchise = Franchise::all();
        return view('admin.franchise.index', compact('franchise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchise.create');
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
            'name' => 'required|unique:franchises,name',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
        ]);
        $input = $request->all();
        Franchise::create($input);
        return redirect()->route('admin.franchise')->with('success','Franchise Created Successfully');
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
        $fr = Franchise::find($id);
        return view('admin.franchise.edit', compact('fr'));
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
            'name' => 'required|unique:franchises,name,'.$id,
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
        ]);
        $input = $request->all();
        $fr = Franchise::find($id);
        $fr->update($input);
        return redirect()->route('admin.franchise')->with('success','Franchise Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Franchise::find($id)->delete();
        return redirect()->route('admin.franchise')->with('success','Franchise Deleted Successfully');
    }
}
