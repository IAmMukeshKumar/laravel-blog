<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Guest relation with comment
    public function guest()
    {
        return $this->belongsTo('App\Guest');
    }
}
