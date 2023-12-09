<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class NationalityCertificateEng extends Model
{
    protected $table = 'nationality_certificate_engs';
    protected $fillable = ['serial_no','name','father_husband','counselor_id','mother','area_name','road_name','word_no','post_office','thana','upazila','certificate_details'];
}
