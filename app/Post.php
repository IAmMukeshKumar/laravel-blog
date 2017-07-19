<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];


     //One category may belong to many posts.
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }


     // One post may have many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
