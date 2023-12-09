<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use Illuminate\Http\Request;

class StockCategoryController extends Controller{
    public function index() {
        $categories = StockCategory::all();

        return view('stock_distribution.category.all', compact('categories'));
    }

    public function add() {
        return view('stock_distribution.category.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'name' => 'required|string|unique:stock_categories|max:255',
            'status' => 'required'
        ]);

        $category = new StockCategory();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('stock_distribution_category')->with('message', 'Category add successfully.');
    }

    public function edit(StockCategory $category) {
        return view('stock_distribution.category.edit', compact('category'));
    }

    public function editPost(StockCategory $category, Request $request) {


        $request->validate([
            'name' => 'required|string|max:255|unique:stock_categories,name,'.$category->id,
            'status' => 'required'
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('stock_distribution_category')->with('message', 'Category edit successfully.');
    }
}
