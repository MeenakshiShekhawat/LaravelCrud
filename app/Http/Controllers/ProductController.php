<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index',[
            'products' => product::latest()->paginate(5) 
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //validate data...
        $request->validate([
            'name' =>'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:10000'
        ]);
        //Upload image..
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created successfully.');
    }

    public function edit($id)
    {
        $product = product::where('id',$id)->first();
        return view('products.edit',['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        //validate data...
        $request->validate([
            'name' =>'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:10000'
        ]);
        $product = Product::where('id',$id)->first();
        if(isset($request->image))
        {
        //Upload image..
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product->image = $imageName;
        }
       
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated successfully.');
    }
    
    public function destroy($id)
    {
        $product = product::where('id',$id)->first();
        $product->delete();
        // return back()->withSuccess('Product Deleted successfully.');
        return view('products.index')->withSuccess('Product Deleted Successfully');
    }
    public function show($id)
    {
        $product = product::where('id',$id)->first();

        return view('products.show',['product' => $product]);
    }
}
