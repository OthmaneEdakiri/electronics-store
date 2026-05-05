<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('orderItems.product')->where('user_id', Auth::id())->latest()->get();

        return view("pages.orders", compact("orders"));
    }

    public function store(Request $request)
    {
        $payment_method = $request->payment_method;

        if (!in_array($payment_method, ['cash_on_delivery', 'paypal'])) {
            return redirect()->back();
        }

        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = config('shipping.price', 0);

        $total = $subtotal + $shipping;

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity
            ]);
        }

        if ($payment_method === 'paypal') {
            return redirect()->route("paypal.payment", $order->id);
        } else {
            foreach ($cartItems as $item) {
                $item->delete();
            }
            return redirect()->route("orders.index")->with("success", "Your Order created successfully");
        }
    }
}
