<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Defining virtual path for photos

    public function getPhotoLargeAttribute()
    {
        return Storage::url('large' . $this->photo_path);
    }

    public function getPhotoThumbnailAttribute()
    {
        return Storage::url('thumbnail' . $this->photo_path);
    }

    public function getPhotoMediumAttribute()
    {
        return Storage::url('medium' . $this->photo_path);
    }

}
