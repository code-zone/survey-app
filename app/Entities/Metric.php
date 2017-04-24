<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{

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
     * @return \Illuminate\Database\Eloquent\HasManyRelation
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
    public function score($project, $user = null)
    {
        $ratting = $this->ratings()
            ->where('project_id', $project)
            ->when($user, function ($query) use ($user) {
                return $query->where('user_id', $user);
            }, function ($query) {
                return $query;
            })->avg('rating');
        return null == $ratting ? 0 : (double) $ratting * 7;
    }
}