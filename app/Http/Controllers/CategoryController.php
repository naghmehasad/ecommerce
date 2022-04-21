<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index() {
        $categories = Category::where('status','1')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        $categories = Category::whereNull('category_id')->get();
        return view('admin.category.add',compact('categories'));
    }

    public function store(Request $request) {
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
        );
        $create = Category::create($data);
        return redirect()->route('category.create');

    }
}
