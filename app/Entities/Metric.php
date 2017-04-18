<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    /**
     * Global metric for measurement.
     **/
    const INDEX = 4.149;

    /**
     * Fillable model fields.
     *
     * @var array
     **/
    protected $fillable = ['details', 'metric_name', 'score_index'];

    /**
     * Metric constraints.
     *
     * @return Illuminate\Database\Eloquent\HasManyRelation
     **/
    public function constraints()
    {
        return $this->hasMany('App\Entities\Constraint');
    }

    /**
     * Metric Scores relation.
     *
     * @return Illuminate\Database\Eloquent\HasManyRelation
     **/
    public function scores()
    {
        return $this->hasMany('App\Entities\Score');
    }

    /**
     * Metric Rating relation.
     *
     * @return Illuminate\Database\Eloquent\HasManyRelation
     **/
    public function ratings()
    {
        return $this->hasMany('App\Entities\Rating');
    }

    /**
     * Calculate Metrics.
     *
     * @author
     **/
    public function score($project)
    {
        return self::INDEX * ($this->ratings()->where('project_id', $project)->avg('rating') * $this->score_index);
    }
}
