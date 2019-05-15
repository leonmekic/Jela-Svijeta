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

    protected $table = 'meals';

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
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function description()
    {
        return $this->hasOne('App\Models\Description', 'id');
    }
}
