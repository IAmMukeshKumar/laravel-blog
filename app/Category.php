<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}
