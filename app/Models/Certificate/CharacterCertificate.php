<?php

namespace App\Models\Certificate;


use Illuminate\Database\Eloquent\Model;

class CharacterCertificate extends Model
{
    protected $table = 'character_certificates';
    protected $fillable = ['serial_no','name','father_husband','mother','address','certificate_details'];
}
