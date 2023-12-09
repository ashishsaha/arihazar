<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class OyarishCertificate extends Model
{
    public function counselor() {
        return $this->belongsTo(Counselor::class);
    }
}
