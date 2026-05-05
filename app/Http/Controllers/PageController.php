<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home(){
        $categories = Category::all();
        $allProducts = Product::all()->take(6);

        return view("welcome", compact('categories', 'allProducts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
