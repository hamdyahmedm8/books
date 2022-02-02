<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    function user(){
        return $this->belongsTo('App\User');
    }

}
