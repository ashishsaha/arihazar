<?php

namespace App\Models\Certificate;


use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table ='certificates';
    protected $fillable = ['serial_no','name','father_husband','mother','present_address','parmanent_address','certificate_details'];

}
