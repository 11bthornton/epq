<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    protected $fillable = [
        'body', 'key', 'uid',
    ];
}
