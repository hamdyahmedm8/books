<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function books(){
        return $this->belongsToMany('App\Book','category_book');
    }

}
