<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockSupplier;
use Illuminate\Http\Request;

class StockSupplierController extends Controller{
    public function index() {
        $suppliers = StockSupplier::all();
        return view('stock_distribution.supplier.all', compact('suppliers'));
    }

    public function add() {
        return view('stock_distribution.supplier.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'mobile_no' => 'nullable|digits:11',
            'address' => 'nullable|string|max:255',
            'status' => 'required'
        ]);

        $supplier = new StockSupplier();
        $supplier->name = $request->name;
        $supplier->company_name = $request->company_name;
        $supplier->mobile = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();


        return redirect()->route('stock_distribution_supplier')->with('message', 'Supplier add successfully.');
    }

    public function edit(StockSupplier $supplier) {
        return view('stock_distribution.supplier.edit', compact('supplier'));
    }

    public function editPost(StockSupplier $supplier, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'mobile_no' => 'nullable|digits:11',
            'address' => 'nullable|string|max:255',
            'status' => 'required'
        ]);

        $supplier->name = $request->name;
        $supplier->company_name = $request->company_name;
        $supplier->mobile = $request->mobile_no;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();


        return redirect()->route('stock_distribution_supplier')->with('message', 'Supplier edit successfully.');
    }
}
