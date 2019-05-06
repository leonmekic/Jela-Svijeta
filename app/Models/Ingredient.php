<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['code'];

    public function meal()
    {
        return $this->belongsToMany('App\Models\Meal', 'ingredient_meal');
    }
}
