<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
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
            'customer_id'      => 'required|exists:customers,id',
            'ammount'          => 'required|numeric|min:0',
            'shipping_address' => 'required|string|max:255',
            'order_address'    => 'required|string|max:255',
            'order_email'      => 'required|email',
            'order_date'       => 'nullable|string',
            'order_status'     => 'sometimes|string',
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
            'customer_id'      => 'sometimes|exists:customers,id',
            'ammount'          => 'sometimes|numeric|min:0',
            'shipping_address' => 'sometimes|string|max:255',
            'order_address'    => 'sometimes|string|max:255',
            'order_email'      => 'sometimes|email',
            'order_date'       => 'nullable|string',
            'order_status'     => 'sometimes|string',
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
