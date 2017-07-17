<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     // Attributes that are not mass assignable

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];


     //One category may have many posts

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
