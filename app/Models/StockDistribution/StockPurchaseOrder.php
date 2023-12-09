<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPurchaseOrder extends Model
{
    use HasFactory;

//    public function products() {
//        return $this->belongsToMany(StockProduct::class)
//            ->withPivot('id','category_id','sub_category_id',
//                'name',  'quantity',
//                'unit_price', 'total');
//    }
    public function orderProducts() {
        return $this->hasMany(StockProductPurchaseOrder::class,'purchase_order_id','id');
    }

    public function order_products() {
        return $this->hasMany(StockProductPurchaseOrder::class,'purchase_order_id','id');
    }

    public function supplier() {
        return $this->belongsTo(StockSupplier::class);
    }

    public function payments() {
        return $this->hasMany(StockPurchasePayment::class);
    }
}
