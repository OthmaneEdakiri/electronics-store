<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = config('shipping.price', 0);

        $total = $subtotal + $shipping;

        return view('pages.cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $validated = $request->validate([
            'quantity' => 'nullable|integer|min:1'
        ]);

        $quantity = $validated['quantity'] ?? 1;

        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'cart_items' => 'required|array',
            'cart_items.*' => 'required|integer|min:0'
        ]);

        foreach ($validated['cart_items'] as $cartItemId => $quantity) {
            // Find cart item and verify ownership (security)
            $cartItem = CartItem::where('id', $cartItemId)
                ->where('user_id', Auth::id())
                ->first();

            if (!$cartItem) {
                continue;
            }

            // If quantity equals 0, remove the item
            if ($quantity == 0) {
                $cartItem->delete();
            } else {
                // Update quantity
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    }

    public function remove($id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $cartItem->delete();

        return redirect()->back();
    }
}
