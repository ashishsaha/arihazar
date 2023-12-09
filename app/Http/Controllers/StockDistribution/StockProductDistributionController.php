<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use App\Models\StockDistribution\StockEmployee;
use App\Models\StockDistribution\StockProduct;
use App\Models\StockDistribution\StockPurchaseInventory;
use App\Models\StockDistribution\StockPurchaseInventoryLog;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class StockProductDistributionController extends Controller{
    public function index(){
        return view('stock_distribution.distribution.all');
    }
    public function datatable() {

        $query = StockPurchaseInventoryLog::where('type',2)
            ->with('product','category','subcategory','employee');

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
            ->addColumn('employee', function(StockPurchaseInventoryLog $log) {
                return $log->employee->name??'';
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


    public function distribution() {
        $categories = StockCategory::where('status',1)
            ->orderBy('name')
            ->get();
        $employees = StockEmployee::where('satatus',1)
            ->orderBy('name')
            ->get();

        return view('stock_distribution.distribution.create', compact('categories','employees'));
    }

    public function distributionPost(Request $request) {
        $request->validate([
            'employee' => 'required',
            'date' => 'required|date',
            'category.*' => 'required',
            'subcategory.*' => 'required',
            'product.*' => 'required',
            'quantity.*' => 'required|numeric|min:.01',
            'remarks.*' => 'nullable|max:255',
            'requisition_no.*' => 'nullable',
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
            $inventoryLog->employee_id = $request->employee;
            $inventoryLog->category_id = $product->category_id;
            $inventoryLog->sub_category_id = $product->sub_category_id;
            $inventoryLog->type = 2;
            $inventoryLog->date = $request->date;
            $inventoryLog->quantity = $request->quantity[$counter];
            $inventoryLog->requisition_no = $request->requisition_no[$counter];
            $inventoryLog->note = $request->remarks[$counter];
            $inventoryLog->unit_price = $inventory->avg_unit_price;
            $inventoryLog->save();

            $counter++;
        }



        return redirect()->route('stock_distribution_all_distribution')
            ->with('message','Product Distribution Successful.');
    }
}
