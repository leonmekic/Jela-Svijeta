<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['code'];

    public function meal()
    {
        return $this->belongsTo('App\Models\Meal');
    }
}
