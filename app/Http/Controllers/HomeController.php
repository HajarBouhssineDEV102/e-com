<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $categories = \App\Models\Category::all();
        return view('home', compact('products', 'categories'));
    }
}
