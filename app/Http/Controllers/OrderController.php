<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'      => 'required|integer|exists:customers,id',
            'ammount'          => 'required|numeric|min:0',
            'shipping_address' => 'required|string',
            'order_address'    => 'required|string',
            'order_email'      => 'required|string|email',
            'order_date'       => 'required|date',
            'order_status'     => 'required|string|max:50',
        ]);

        $order = Order::create($request->all());

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id'      => 'sometimes|integer|exists:customers,id',
            'ammount'          => 'sometimes|numeric|min:0',
            'shipping_address' => 'sometimes|string',
            'order_address'    => 'sometimes|string',
            'order_email'      => 'sometimes|string|email',
            'order_date'       => 'sometimes|date',
            'order_status'     => 'sometimes|string|max:50',
        ]);

        $order->update($request->all());

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return $order;
    }
}
