<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['code'];

    public function ingredient()
    {
        return $this->hasMany('App\Models\Ingredient');
    }

    public function tag()
    {
        return $this->hasMany('App\Models\Tags');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Category');
    }
}
