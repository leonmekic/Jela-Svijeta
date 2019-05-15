<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['description'];

    protected $fillable = ['code'];

    public function meal()
    {
        return $this->belongsTo('App\Models\Meal');
    }
}
