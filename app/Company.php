<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'name',
        'ruc',
        'address',            
        'contact_name',
        'contact_phone',
        'contact_email',
        'contact_name2',
        'contact_phone2',
        'contact_email2',
    ];
}
