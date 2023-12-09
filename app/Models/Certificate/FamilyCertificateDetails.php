<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class FamilyCertificateDetails extends Model
{
    protected $table = 'family_certificate_details';
    protected $fillable = ['family_certificate_id','name','national_id','birthday','comment','status'];
}
