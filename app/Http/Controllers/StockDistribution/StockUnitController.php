<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockUnit;
use Illuminate\Http\Request;

class StockUnitController extends Controller{
    public function index() {
        $units = StockUnit::all();

        return view('stock_distribution.unit.all', compact('units'));
    }

    public function add() {
        return view('stock_distribution.unit.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $unit = new StockUnit();
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->save();

        return redirect()->route('stock_distribution_unit')->with('message', 'সফলভাবে ইউনিট যোগ করা হয়েছে');
    }

    public function edit(StockUnit $unit) {
        return view('stock_distribution.unit.edit', compact('unit'));
    }

    public function editPost(StockUnit $unit, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required'
        ]);

        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->save();

        return redirect()->route('stock_distribution_unit')->with('message', 'সফলভাবে ইউনিট আপডেট করা হয়েছে');
    }
}
