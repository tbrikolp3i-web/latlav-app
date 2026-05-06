<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
       // $customers = Customer::all();
       //$customers = Customer::paginate(5); 

        $search = $request->search;
        $customers = Customer::where('nama', 'like', "%$search%")->paginate(5);
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        return view('customers.create');
    }
    /*
    public function store(Request $request)
    {
        Customer::create($request->all());
        return redirect('/customers');
    }
    */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }
    /*
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        
        return redirect('/customers');
    }
    */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/customers');
    }

    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required'
        ]);
        Customer::create($request->all());
        return redirect('/customers')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required'
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect('/customers')->with('success', 'Data berhasil diupdate');
    }
}
