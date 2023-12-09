<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProductPurchaseOrder extends Model
{
    use HasFactory;

    public function unit() {
        return $this->belongsTo(StockUnit::class);
    }

    public function category() {
        return $this->belongsTo(StockCategory::class);
    }
    public function subCategory() {
        return $this->belongsTo(StockSubCategory::class);
    }
    public function stockProduct() {
        return $this->belongsTo(StockProduct::class,'product_id','id');
    }
}
