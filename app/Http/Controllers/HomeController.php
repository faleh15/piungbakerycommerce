<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function home()
    {
        $product = Product::all(); 
        return view('home.index', compact('product')); 
    }

    public function login_home()
    {
        $product = Product::all(); 
        return view('home.index', compact('product')); 
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        return view('home.product_details', compact('data'));
    }

    public function navbar_shop() {
        $products = Product::all();
        return view('home.navbar_shop', compact('products'));  // menyesuaikan dengan path folder
    }

    public function navbar_testimonial() {
        return view('home.navbar_testimonial');  // menyesuaikan dengan path folder
    }

    public function navbar_why() {
        return view('home.navbar_why');  // menyesuaikan dengan path folder
    }

    public function navbar_contact() {
        return view('home.navbar_contact');  // menyesuaikan dengan path folder
    }

}
