<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category() //Not categories()
    {
        return $this->belongsTo('App\Category');
    }
}
