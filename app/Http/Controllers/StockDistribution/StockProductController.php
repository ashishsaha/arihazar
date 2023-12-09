<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use App\Models\StockDistribution\StockProduct;
use App\Models\StockDistribution\StockUnit;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class StockProductController extends Controller{
    public function index() {

        $products = StockProduct::with( 'category', 'subCategory')
            ->get();

        return view('stock_distribution.product.all', compact('products'));
    }
    public function add() {

        $categories = StockCategory::where('status', 1)->orderBy('name')->get();

        $units = StockUnit::where('status', 1)
            ->orderBy('name')->get();

        return view('stock_distribution.product.add', compact('categories',
            'units'));
    }

    public function addPost(Request $request) {


        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        $imagePath = null;

        if ($request->image) {
            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product';
            $file->move($destinationPath, $filename);

            $imagePath = 'uploads/product/'.$filename;
        }

        $product = new StockProduct();
        $product->name = $request->name;
        $product->image = $imagePath;
        $product->unit_id = $request->unit;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('stock_distribution_product')->with('message', 'Product add successfully.');
    }

    public function edit(StockProduct $product) {

        $categories = StockCategory::where('status', 1)->orderBy('name')->get();

        $units = StockUnit::where('status', 1)
            ->orderBy('name')->get();

        return view('stock_distribution.product.edit', compact('product',
            'categories','units'));
    }

    public function editPost(StockProduct $product, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->image) {

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/product';
            $file->move($destinationPath, $filename);

            $product->image = 'uploads/product/'.$filename;
        }

        $product->name = $request->name;
        $product->unit_id = $request->unit;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();


        return redirect()->route('stock_distribution_product')->with('message', 'Product edit successfully.');
    }
}
