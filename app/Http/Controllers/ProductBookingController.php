<?php

namespace App\Http\Controllers;

use App\Models\ProductBooking;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductBookingController extends Controller
{

    public function store(Request $request) {
        $cart_id = $request->cart_id;
        $data = array();
        $amount = 0;

        foreach ($cart_id as $i=>$value) {
            $cart = Cart::find($value);
            $data[$i]['user_id'] = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qty'] = $cart->qty;
            $data[$i]['payment_status'] = '0';
        }

        $ProductBooking = ProductBooking::insert($data);
                
        if ($ProductBooking) {
            Cart::destroy($cart_id);

        }

    }
}
