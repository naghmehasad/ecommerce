<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
        $data = array(
            'product_id'=>$request->product_id,
            'qty'=>$request->qty,
            'user_id'=>Auth::user()->id,
        );

        Cart::create($data);
        return redirect()->route('cart');
    }
}