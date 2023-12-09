<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPurchaseInventory extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(StockProduct::class, 'product_id', 'id');
    }
    public function category() {
        return $this->belongsTo(StockCategory::class, 'category_id', 'id');
    }
    public function subcategory() {
        return $this->belongsTo(StockSubCategory::class, 'sub_category_id', 'id');
    }
}
