<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public function meal()
    {
        return $this->belongsTo('App\Models\Meal');
    }
}
