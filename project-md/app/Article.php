<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function category() //Not categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function user() //Not user()
    {
        return $this->belongsTo('App\User');
    }
}