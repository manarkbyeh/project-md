<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_giver_id', 'user_reciever_id', 'article_id', 'aantal', 'datum', 'uur', 'comment'
        ];
}
