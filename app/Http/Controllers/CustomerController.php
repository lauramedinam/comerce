<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
            'email'                    => 'required|string|email|max:255|unique:customers,email',
            'password'                 => 'required|string|min:6|max:255',
            'full_name'                => 'required|string|max:255',
            'billing_address'          => 'nullable|string|max:255',
            'default_shipping_address' => 'nullable|string|max:255',
            'country'                  => 'nullable|string|max:100',
            'phone'                    => 'nullable|string|max:50',
        ]);

        $customer = Customer::create($request->all());

        return response()->json(Customer::all());
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
        return response()->json($customer);
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
            'email'                    => 'sometimes|string|email|max:255|unique:customers,email,' . $customer->id,
            'password'                 => 'sometimes|string|min:6|max:255',
            'full_name'                => 'sometimes|string|max:255',
            'billing_address'          => 'sometimes|nullable|string|max:255',
            'default_shipping_address' => 'sometimes|nullable|string|max:255',
            'country'                  => 'sometimes|nullable|string|max:100',
            'phone'                    => 'sometimes|nullable|string|max:50',
        ]);

        $customer->update($request->all());

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return $customer;
    }
}
