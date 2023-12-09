<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class FamilyCertificateEnglish extends Model
{
    //
    protected $table = 'family_certificate_englishes';
    protected $fillable = ['serial_no','name','status'];
}
