<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id')->select("created_at","fio","product_id","summ","status")->get();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('id')->get();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fio' => 'required|max:255',
            'product_id' => 'required|integer',
            'quantity'=>'required|integer'
         ]);
         $data["comment"]=$request->input("comment");
         $id = $request->input("product_id");
         $product = Product::select("id","price")->where("id","=",$id)->get()[0];
         $data["summ"]=$product["price"]*$request->input("quantity");
         Order::create($data);
         return back()->with('message', 'Заказ создан.');//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::where("id","=",$id)->get()[0];//
        return view("orders.show",compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $products = Product::orderBy('id')->get();
        return view('orders.edit', compact('order','products')); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'fio' => 'required|max:255',
            'product_id' => 'required|integer',
            'quantity'=>'required|integer'
         ]);
         $data["comment"]=$request->input("comment");
         $id = $request->input("product_id");
         $product = Product::select("id","price")->where("id","=",$id)->get()[0];
         $data["summ"]=$product["price"]*$request->input("quantity");
         $order->update($data);
         return back()->with('message', 'Заказ обновлен.');//
    }
    public function change_status(string $id){
        $order = Order::where("id","=",$id)->get()[0];//
        $order->update(["status"=>"Выполнен"]);
        return back()->with('message', 'Заказ обновлен.');//
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();//
        return back()->with('message', 'Заказ удален.');
    }
}
