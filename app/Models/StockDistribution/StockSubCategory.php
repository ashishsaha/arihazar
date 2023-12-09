<?php

namespace App\Models\StockDistribution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockSubCategory extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(StockCategory::class);
    }
}
