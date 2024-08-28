<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'description' => $request->description,
        ]);
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $edit = Product::find($id);
        return view('product.edit', compact('categories', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::where('id', $id)->update([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_qty' => $request->product_qty,
            'product_price' => $request->product_price,
            'description' => $request->description,
        ]);
        return redirect()->to('product')->with('message', 'Data berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();
        return redirect()->to('product')->with('message', 'Data berhasil di hapus');
    }
}
