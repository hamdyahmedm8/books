<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function categories(){
        return $this->belongsToMany('App\Category','category_book');
    }

}
