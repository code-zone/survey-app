<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    /**
     * undocumented class variable.
     *
     * @var string
     **/
    protected $fillable = ['metric_id', 'constraint_name', 'weight'];
}
