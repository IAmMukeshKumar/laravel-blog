<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*
     * Attribute(s) that are not mass assignable
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    /*
     * One category may belong to many posts.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
