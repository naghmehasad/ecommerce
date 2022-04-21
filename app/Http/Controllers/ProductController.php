<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    public function create() {
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data['image'] = $fileName;
        }
            
        $create = Product::create($data);
        return redirect()->route('product.list');
    }

    public function edit(Product $product,Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.edit',compact('product','categories'));
    }

    public function update(Request $request, Product $product){
        $id = $request->id;
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
        );
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $data['image'] = $fileName;
        }

        $create = Product::where('id',$id)->update($data);
        return redirect()->route('product.list');

    }

    public function destroy(Product $product,Request $request) {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return response()->json('success');
    }

    
    


}
