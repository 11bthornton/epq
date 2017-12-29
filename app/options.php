<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    protected $fillable = [
        'body', 'questionid'
    ];
    public $votes;
}
