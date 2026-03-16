<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $methods = ShippingMethod::orderBy('id', 'desc')->get();
        return view('admin.shipping.index', compact('methods'));
    }

    public function create()
    {
        return view('admin.shipping.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'location' => 'nullable|string',
        ]);

        ShippingMethod::create($request->all());
        return redirect()->route('shipping.index')->with('success', 'Shipping Method created successfully.');
    }

    public function edit($id)
    {
        
        $shippingMethod = ShippingMethod::findOrFail($id);
      
        return view('admin.shipping.edit', compact('shippingMethod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string',
        ]);

         $shippingMethod = ShippingMethod::findOrFail($id);

        $shippingMethod->update($request->all());
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping Method updated successfully.');
    }

    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->delete();
        return redirect()->route('shipping.index')->with('success', 'Shipping Method deleted successfully.');
    }
}
