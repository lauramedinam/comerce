<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return $customers;
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
            'firstname'      => 'required|exists:customers,id',
            'lastname'          => 'required|numeric|min:0',
            'email' => 'required|string|max:255',
            'password'    => 'required|string|max:255',
            'phone'      => 'required|email',
            'address'       => 'nullable|string',
            'order_status'     => 'sometimes|string',
        ]);

        $customer = Customer::create($request->all());

        return $customer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'firstname'      => 'sometimes|exists:customers,id',
            'lastname'          => 'sometimes|numeric|min:0',
            'email' => 'sometimes|string|max:255',
            'password'    => 'sometimes|string|max:255',
            'phone'      => 'sometimes|email',
            'address'       => 'nullable|string',
            'order_status'     => 'sometimes|string',
        ]);

        $order->update($request->all());

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer )
    {
        $customer->delete();
        return $customer;
    }
}
