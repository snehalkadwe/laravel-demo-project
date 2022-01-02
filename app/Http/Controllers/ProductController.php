<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products;
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        // dd(auth()->id(), auth()->user()->name, Auth::ID());
        $product = Product::create([
            'user_id' => auth()->id(),
            'product_name' => $request->product_name,
            'cost' => $request->cost,
            'quantity' => $request->product_qty,
        ]);
        // return redirect()->back()->with('success', 'Product added successfully');
        return redirect(route('product.index'))->with('success', 'Product added successfully');
    }
}