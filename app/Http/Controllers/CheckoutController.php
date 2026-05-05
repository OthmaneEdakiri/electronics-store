<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if(count($cartItems) === 0){
            return redirect()->back();
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = config('shipping.price', 0);

        $total = $subtotal + $shipping;
        return view("pages.checkout", compact("cartItems", "shipping", "total", "subtotal"));
    }

}
