<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class LandlessCertificate extends Model
{

    protected $fillable = ['serial_no','name','father_husband','mother','present_address','parmanent_address','certificate_details'];

}
