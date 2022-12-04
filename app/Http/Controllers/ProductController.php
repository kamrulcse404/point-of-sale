<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.product', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::orderBy('title', 'asc')->get()
        ]);
    }

    public function store(Request $request)
    {

        $formRequest = $request->validate([
            'category_id' => 'required',
            'title' => 'required|regex:/^[a-zA-Z- ]*$/',
            'description' => 'required',
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Product::create($formRequest);
        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }

    public function edit($id){
        return view('products.edit', [
            'product' => Product::where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, $id){

        $formRequest = $request->validate([
            'category_id' => 'required',
            'title' => 'required|regex:/^[a-zA-Z- ]*$/',
            'description' => 'required',
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Product::create($formRequest);
        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', compact('product'));
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Product deleted successfully!');
    }
}
