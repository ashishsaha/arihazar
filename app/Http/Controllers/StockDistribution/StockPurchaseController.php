<?php

namespace App\Http\Controllers\StockDistribution;

use App\Http\Controllers\Controller;
use App\Models\StockDistribution\StockCategory;
use App\Models\StockDistribution\StockProduct;
use App\Models\StockDistribution\StockPurchaseInventory;
use App\Models\StockDistribution\StockPurchaseInventoryLog;
use App\Models\StockDistribution\StockPurchaseOrder;
use App\Models\StockDistribution\StockSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StockPurchaseController extends Controller{
    public function purchases() {
        $suppliers = StockSupplier::where('status', 1)->orderBy('name')->get();
        $products = StockProduct::where('status', 1)->orderBy('name')->get();
        $categories = StockCategory::where('status',1)
            ->orderBy('name')
            ->get();

        return view('stock_distribution.purchase.purchase_order.create', compact('suppliers', 'products','categories'));
    }

    public function purchasesPost(Request $request) {

        $request->validate([
            'supplier' => 'required',
            'date' => 'required|date',
            'category.*' => 'required',
            'subcategory.*' => 'required',
            'quantity.*' => 'required|numeric|min:.01',
            'unit_price.*' => 'required|numeric|min:0',
        ]);

        $order = new StockPurchaseOrder();
        $order->order_no = rand(10000000, 99999999);
        $order->supplier_id = $request->supplier;
        $order->date = $request->date;
        $order->total = 0;
        $order->paid = 0;
        $order->due = 0;
        $order->save();

        $counter = 0;
        $total = 0;
        foreach ($request->product as $reqProduct) {

            $product = StockProduct::find($reqProduct);

            $order->products()->attach($reqProduct, [
                'name' => $product->name,
                'category_id' => $product->category_id,
                'sub_category_id' => $product->sub_category_id,
                'quantity' => $request->quantity[$counter],
                'unit_price' => $request->unit_price[$counter],
                'total' => $request->quantity[$counter] * $request->unit_price[$counter],
            ]);

            $total += $request->quantity[$counter] * $request->unit_price[$counter];

            // Inventory
            $exist = StockPurchaseInventory::where('product_id', $product->id)
                ->first();

            $totalPrice = DB::table('product_purchase_order')
                ->where('product_id', $product->id)
                ->sum('total');

            $totalQuantity = DB::table('product_purchase_order')
                ->where('product_id', $product->id)
                ->sum('quantity');

            $avgPrice = $totalPrice / $totalQuantity;

            if ($exist) {
                $inventory = StockPurchaseInventory::where('product_id',$product->id)->first();
                $inventory->product_id = $product->id;
                $inventory->category_id = $product->category_id;
                $inventory->sub_category_id = $product->sub_category_id;
                $inventory->last_unit_price = $request->unit_price[$counter];
                $inventory->avg_unit_price = $avgPrice;
                $inventory->save();
                $invent_total = $request->quantity[$counter] * $request->unit_price[$counter];
                $inventory->increment('quantity',$request->quantity[$counter]);
                $inventory->increment('total',$invent_total);
            }else {
                $inventory = new StockPurchaseInventory();
                $inventory->product_id = $product->id;
                $inventory->category_id = $product->category_id;
                $inventory->sub_category_id = $product->sub_category_id;
                $inventory->quantity = $request->quantity[$counter];
                $inventory->last_unit_price = $request->unit_price[$counter];
                $inventory->avg_unit_price = $avgPrice;
                $inventory->total = $request->quantity[$counter] * $request->unit_price[$counter];
                $inventory->save();
            }


            $inventoryLog = new StockPurchaseInventory();
            $inventoryLog->product_id = $product->id;
            $inventoryLog->purchase_order_id = $order->id;
            $inventoryLog->category_id = $product->category_id;
            $inventoryLog->sub_category_id = $product->sub_category_id;
            $inventoryLog->type = 1;
            $inventoryLog->date = $request->date;
            $inventoryLog->quantity = $request->quantity[$counter];
            $inventoryLog->unit_price = $request->unit_price[$counter];
            $inventoryLog->supplier_id = $request->supplier;
            $inventoryLog->save();

            $counter++;
        }

        $order->total = $total;
        $order->due = $total;
        $order->save();



        return redirect()->route('purchase_receipt.details', ['order' => $order->id]);
    }

    public function purchaseReceipt() {
        return view('stock_distribution.purchase.receipt.all');
    }

    public function purchaseReceiptDetails(StockPurchaseOrder $order) {
//        $humaira = StockPurchaseOrder::with('orderProducts')->where('id',$order->id)->get();
//        dd($humaira);
        return view('stock_distribution.purchase.receipt.details', compact('order'));
    }

    public function purchaseReceiptPrint(StockPurchaseOrder $order) {

        return view('stock_distribution.purchase.receipt.print', compact('order'));
    }

    public function purchaseReceiptDatatable() {

        $query = StockPurchaseOrder::with('supplier');

        return DataTables::eloquent($query)
            ->addColumn('supplier', function(StockPurchaseOrder $order) {
                return $order->supplier->name;
            })
            ->addColumn('action', function(StockPurchaseOrder $order) {
                $btn = '<a href="'.route('stock_distribution_purchase_receipt_details', ['order' => $order->id]).'" class="btn btn-primary btn-sm">View</a> ';
                $btn .= '<a target="_blank" href="'.route('stock_distribution_purchase_receipt_print', ['order' => $order->id]).'" class="btn btn-primary btn-sm">Print</a>';
                return $btn;
            })

            ->editColumn('date', function(StockPurchaseOrder $order) {
                return date('j F, Y',strtotime($order->date));
            })
            ->editColumn('total', function(StockPurchaseOrder $order) {
                return '৳'.number_format($order->total, 2);
            })
            ->editColumn('paid', function(StockPurchaseOrder $order) {
                return '৳'.number_format($order->paid, 2);
            })
            ->editColumn('due', function(StockPurchaseOrder $order) {
                return '৳'.number_format($order->due, 2);
            })
            ->orderColumn('date', function ($query, $order) {
                $query->orderBy('date', $order)->orderBy('created_at', 'desc');
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function purchaseInventory() {
        return view('stock_distribution.purchase.inventory.all');
    }

    public function purchaseInventoryDetails(StockProduct $product) {

        return view('stock_distribution.purchase.inventory.details', compact('product'));
    }
    public function purchaseInventoryDatatable() {
        $query = StockPurchaseInventory::with('product', 'product.category', 'product.subcategory');

        return DataTables::eloquent($query)
            ->addColumn('product', function( $inventory) {
                return $inventory->product->name;
            })

            ->addColumn('category', function(StockPurchaseInventory $inventory) {
                return $inventory->product->category->name;
            })
            ->addColumn('subcategory', function(StockPurchaseInventory $inventory) {
                return $inventory->product->subcategory->name;
            })

            ->addColumn('action', function(StockPurchaseInventory $inventory) {
                return '<a href="'.route('stock_distribution_purchase_inventory_details', ['product' => $inventory->product_id]).'" class="btn btn-primary btn-sm">Details</a>';

            })
            ->editColumn('quantity', function(StockPurchaseInventory $inventory) {
                return number_format($inventory->quantity, 2);
            })
            ->editColumn('total', function(StockPurchaseInventory $inventory) {
                return number_format($inventory->total, 2);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function purchaseInventoryDetailsDatatable() {
        $query = StockPurchaseInventoryLog::where('product_id', request('product_id'))
            ->with('product','employee', 'supplier', 'order');

        return DataTables::eloquent($query)
            ->editColumn('date', function(StockPurchaseInventoryLog $log) {
                return date('j F, Y',strtotime($log->date));
            })
            ->editColumn('type', function(StockPurchaseInventoryLog $log) {
                if ($log->type == 1)
                    return '<span class="label label-success">Purchase</span>';
                elseif ($log->type == 2)
                    return '<span class="label label-danger">Distribution</span>';
                elseif ($log->type == 3)
                    return '<span class="label label-warning">Damage</span>';
                else
                    return '<span class="label label-danger">Return</span>';
            })
            ->editColumn('quantity', function(StockPurchaseInventoryLog $log) {
                return number_format($log->quantity, 2);
            })
            ->editColumn('avg_unit_price', function(StockPurchaseInventoryLog $log) {
                return number_format($log->avg_unit_price, 2);
            })
            ->editColumn('selling_price', function(StockPurchaseInventoryLog $log) {
                return number_format($log->selling_price, 2);
            })
            ->editColumn('last_unit_price', function(StockPurchaseInventoryLog $log) {
                return number_format($log->last_unit_price, 2);
            })
            ->editColumn('total', function(StockPurchaseInventoryLog $log) {
                return number_format($log->total, 2);
            })
            ->editColumn('unit_price', function(StockPurchaseInventoryLog $log) {
                if ($log->unit_price)
                    return '৳'.number_format($log->unit_price, 2);
                else
                    return '';
            })
            ->editColumn('supplier', function(StockPurchaseInventoryLog $log) {
                if ($log->supplier)
                    return $log->supplier->name;
                else
                    return '';
            })
            ->editColumn('employee', function(StockPurchaseInventoryLog $log) {
                if ($log->employee)
                    return $log->employee->name;
                else
                    return '';
            })
            ->editColumn('order', function(StockPurchaseInventoryLog $log) {
                if ($log->order)
                    return '<a href="'.route('stock_distribution_purchase_receipt_details', ['order' => $log->order->id]).'">'.$log->order->order_no.'</a>';
                else
                    return '';
            })
            ->orderColumn('date', function ($query, $order) {
                $query->orderBy('date', $order)->orderBy('created_at', 'desc');
            })
            ->rawColumns(['type', 'order'])
            ->filter(function ($query) {
                if (request()->has('date') && request('date') != '') {
                    $dates = explode(' - ', request('date'));
                    if (count($dates) == 2) {
                        $query->where('date', '>=', $dates[0]);
                        $query->where('date', '<=', $dates[1]);
                    }
                }

                if (request()->has('type') && request('type') != '') {
                    $query->where('type', request('type'));
                }
            })
            ->toJson();
    }
}
