<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * undocumented class variable.
     *
     * @var string
     **/
    protected $fillable = ['project_name', 'details'];

    /**
     * Metrics relation for projects.
     *
     * @return Illuminate\Database\Eloquent\HasManyRelation
     **/
    public function metrics()
    {
        return $this->hasMany('App\Entities\ProjectMetric');
    }
}
