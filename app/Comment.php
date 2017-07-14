<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   public function guest()
   {
       return $this->belongsTo('App\Guest');
   }
}
