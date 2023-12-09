<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPurchaseInventoryLog extends Model
{
    use HasFactory;

    public function supplier() {
        return $this->belongsTo(StockSupplier::class);
    }

    public function employee() {
        return $this->belongsTo(StockEmployee::class,'employee_id','id');
    }

    public function product() {
        return $this->belongsTo(StockProduct::class, 'product_id', 'id');
    }

    public function order() {
        return $this->belongsTo(StockPurchaseOrder::class, 'purchase_order_id', 'id');
    }


    public function category() {
        return $this->belongsTo(StockCategory::class, 'category_id', 'id');
    }
    public function subcategory() {
        return $this->belongsTo(StockSubCategory::class, 'sub_category_id', 'id');
    }
}
