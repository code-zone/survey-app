<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * Whitelisted fieleds.
     *
     * @var string
     **/
    protected $fillable = ['constraint_id', 'user_id', 'metric_id', 'rating', 'project_id'];
}
