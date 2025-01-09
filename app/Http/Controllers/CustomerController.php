<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }
    public function show($id)
{
    // Find the customer by ID
    $customer = Customer::findOrFail($id);

    // Return a view to show the customer details
    return view('customers.show', compact('customer'));
}

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:customers',
            'name' => 'required',
            'telp' => 'required',
            'email' => 'required|email|unique:customers',
            'alamat' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nik' => 'required|unique:customers,nik,' . $customer->id,
            'name' => 'required',
            'telp' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'alamat' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer berhasil diperbarui');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer berhasil dihapus');
    }
}
