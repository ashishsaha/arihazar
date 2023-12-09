<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use App\Models\StockDistribution\StockProduct;
use App\Models\StockDistribution\StockPurchaseInventory;
use App\Models\StockDistribution\StockPurchaseInventoryLog;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class StockDamageProductController extends Controller{
    public function index()
    {
        return view('stock_distribution.damage_product.all');
    }
    public function datatable() {

        $query = StockPurchaseInventoryLog::where('type',3)
            ->with('product','category','subcategory');

        return DataTables::eloquent($query)

            ->addColumn('product', function(StockPurchaseInventoryLog $log) {
                return $log->product->name;
            })
            ->addColumn('category', function(StockPurchaseInventoryLog $log) {
                return $log->category->name;
            })
            ->addColumn('subcategory', function(StockPurchaseInventoryLog $log) {
                return $log->subcategory->name;
            })

            ->editColumn('date', function(StockPurchaseInventoryLog $log) {
                return date('j F, Y',strtotime($log->date));
            })

            ->editColumn('quantity', function(StockPurchaseInventoryLog $log) {
                return number_format($log->quantity, 2);
            })

            ->orderColumn('date', function ($query, $order) {
                $query->orderBy('date', $order)->orderBy('created_at', 'desc');
            })
            ->toJson();
    }


    public function add() {
        $categories = StockCategory::where('status',1)
            ->orderBy('name')
            ->get();
        return view('stock_distribution.damage_product.create', compact('categories'));
    }

    public function addPost(Request $request) {


        $request->validate([
            'date' => 'required|date',
            'category.*' => 'required',
            'subcategory.*' => 'required',
            'product.*' => 'required',
            'quantity.*' => 'required|numeric|min:.01',
            'remarks.*' => 'nullable|max:255',
        ]);


        $counter = 0;

        foreach ($request->product as $reqProduct) {

            $product = StockProduct::find($reqProduct);

            // Inventory
            $inventory = StockPurchaseInventory::where('product_id', $product->id)
                ->first();


            $invent_total = $inventory->avg_unit_price * $request->quantity[$counter];

            $inventory->decrement('quantity',$request->quantity[$counter]);
            $inventory->decrement('total',$invent_total);


            $inventoryLog = new StockPurchaseInventoryLog();
            $inventoryLog->product_id = $product->id;
            $inventoryLog->category_id = $product->category_id;
            $inventoryLog->sub_category_id = $product->sub_category_id;
            $inventoryLog->type = 3;
            $inventoryLog->date = $request->date;
            $inventoryLog->quantity = $request->quantity[$counter];
            $inventoryLog->note = $request->remarks[$counter];
            $inventoryLog->unit_price = $inventory->avg_unit_price;
            $inventoryLog->save();

            $counter++;
        }

        return redirect()->route('stock_distribution_damage_product')
            ->with('message','Damage Product Add Successful.');
    }
}
