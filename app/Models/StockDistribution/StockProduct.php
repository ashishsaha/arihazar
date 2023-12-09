<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model{
    use HasFactory;

    public function unit() {
        return $this->belongsTo(StockUnit::class,'unit_id','id');
    }

    public function category() {
        return $this->belongsTo(StockCategory::class);
    }
    public function subCategory() {
        return $this->belongsTo(StockSubCategory::class);
    }
}
