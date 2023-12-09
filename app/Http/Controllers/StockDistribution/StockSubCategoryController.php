<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use App\Models\StockDistribution\StockSubCategory;
use Illuminate\Http\Request;

class StockSubCategoryController extends Controller{
    public function index() {
        $subCategories = StockSubCategory::all();

        return view('stock_distribution.sub_category.all', compact('subCategories'));
    }

    public function add() {

        $categories = StockCategory::orderBy('name')->get();

        return view('stock_distribution.sub_category.add', compact('categories'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'category' => 'required',
            'name' => 'required|string|max:255|unique:stock_sub_categories',
            'status' => 'required'
        ]);


        $subCategory = new StockSubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('stock_distribution_sub_category')->with('message', 'Sub Category add successfully.');
    }

    public function edit(StockSubCategory $subCategory) {

        $categories = StockCategory::all();

        return view('stock_distribution.sub_category.edit', compact('subCategory', 'categories'));
    }

    public function editPost(StockSubCategory $subCategory, Request $request) {


        $request->validate([
            'category' => 'required',
            'name' => 'required|string|max:255|unique:stock_sub_categories,name,'.$subCategory->id,
            'status' => 'required'
        ]);


        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('stock_distribution_sub_category')->with('message', 'Sub Category edit successfully.');
    }
}
