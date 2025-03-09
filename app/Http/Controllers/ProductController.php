<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $response = Http::get('https://fakestoreapi.com/products');
        $products = $response->json();
        return view('products.index', compact('products'));
    }
}