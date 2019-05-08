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
        return $this->belongsToMany('App\Models\Ingredient');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
