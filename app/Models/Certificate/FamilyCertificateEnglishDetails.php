<?php

namespace App\Models\Certificate;

use Illuminate\Database\Eloquent\Model;

class FamilyCertificateEnglishDetails extends Model
{
    protected $table = 'family_certificate_english_details';

    protected $fillable = ['family_certificate_id','name','father_name','relation','birthday','present_address','parmanent_address'];
}
