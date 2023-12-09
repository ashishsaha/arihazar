<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockProduct;
use App\Models\StockDistribution\StockPurchaseInventory;
use App\Models\StockDistribution\StockSubCategory;
use Illuminate\Http\Request;

class StockCommonController extends Controller{
    public function getSubCategory(Request $request) {

        $subCategories = StockSubCategory::where('category_id', $request->categoryId)
            ->where('status', 1)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($subCategories);
    }

    public function getProduct(Request $request) {

        $product = StockProduct::where('sub_category_id', $request->subcategoryID)
            ->where('status', 1)
            ->orderBy('name')
            ->get()->toArray();

        return response()->json($product);
    }
    public function getInventoryProduct(Request $request) {

        $product = StockPurchaseInventory::with('product')->where('sub_category_id', $request->subcategoryID)
            ->where('quantity','>' ,0)
            ->orderBy('product_id')
            ->get()->toArray();

        return response()->json($product);
    }
    public function getInventoryProductQty(Request $request) {

        $product = StockPurchaseInventory::where('product_id', $request->productID)
            ->first();

        return response()->json($product);
    }
}
