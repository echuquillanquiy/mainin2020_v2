<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class); 
    }
}
