<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class FamilyCertificate extends Model
{
    protected $table = 'family_certificates';
    protected $fillable = ['serial_no','type','name','father_husband','mother','address','certificate_details'];
}
