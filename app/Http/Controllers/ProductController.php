<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $categories;

    public function __construct(){
        $this->categories = Category::all();
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5120',
            'status' => 'required',
        ]);
        $input = $request->all();
        if($request->hasFile('image')):
            $img = $request->file('image');
            $fname = 'products/'.$img->getClientOriginalName();
            Storage::disk('public')->putFileAs($fname, $img, '');
            $input['image'] = $img->getClientOriginalName();                                 
        endif;
        $product = Product::create($input);
        return redirect()->route('admin.product')->with('success','Record created successfully');
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
        $categories = $this->categories;
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'categories'));
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
        $request->validate([
            'name' => 'required|unique:products,name,'.$id,
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        if($request->hasFile('image')):
            $img = $request->file('image');
            $fname = 'products/'.$img->getClientOriginalName();
            Storage::disk('public')->putFileAs($fname, $img, '');
            $input['image'] = $img->getClientOriginalName();                                 
        endif;
        $product = Product::find($id);
        $product->update($input);
        return redirect()->route('admin.product')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.product')->with('success','Record deleted successfully');
    }
}
