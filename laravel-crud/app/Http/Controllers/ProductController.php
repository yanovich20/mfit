<?php

namespace App\Http\Controllers;

use App\Models\CategorY;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::select("id","name","price","category_id")->get()
        ]);//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }//

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/|gt:0',
            'category_id' => 'required|integer',
         ]);
         $data["description"]=$request->input("description");
         Product::create($data);
 
         return back()->with('message', 'Продукт создан.');//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where("id","=",$id)->get()[0];//
        return view("products.show",compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Product $product, Request  $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/|gt:0',
            'category_id' => 'required|integer',
        ]);
        $data["description"] = $request->input("description");
        $product->update($data);

        return back()->with('message', 'Продукт обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('message', 'Продукт удален.');
    }
}
