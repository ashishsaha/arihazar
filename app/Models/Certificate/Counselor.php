<?php

namespace App\Models\Certificate;


use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    protected $fillable = ['name','word_no','signature'];
    protected $hidden = ['created_at','updated_at'];
}
