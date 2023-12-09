<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class RemarriageCertificateBn extends Model
{
    protected $fillable = [
        'serial_no',
        'name',
        'father_husband',
        'mother',
        'area_name',
        'road_name',
        'word_no',
        'post_office',
        'thana',
        'upazila',
        'certificate_details'
    ];
}
