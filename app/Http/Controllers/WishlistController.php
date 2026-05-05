<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return view('pages.wishlist', compact('wishlistItems'));
    }
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->isInWishlist()) {
            return redirect()->back();
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $id
        ]);

        return redirect()->back()->with("success", 'Product added to Wishlist');
    }

    public function remove(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (!$product->isInWishlist()) {
            return redirect()->back();
        }

        Wishlist::where('product_id', $id)->where('user_id', Auth::id())->delete();

        return redirect()->back()->with("success", 'Product remove from Wishlist');
    }
}
