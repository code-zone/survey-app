<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * undocumented class variable.
     *
     * @var string
     **/
    protected $fillable = ['metric_id', 'score', 'comment'];
}
