<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class options extends Model
{
    protected $fillable = [
        'body', 'questionid'
    ];
    public $votes;
    public $percentage;
    public $MaleVotes;
    public $FemaleVotes;
    public $OtherVotes;
    public $range1;
    public $range2;
    public $range3;
    public $range4;
    public $range5;
}
