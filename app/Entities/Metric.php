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

        return null == $ratting ? 0 : (float) $ratting * 7;
    }

    /**
     * Calculate Metrics.
     *
     * @author
     **/
    public function scoreByAge($project, $age = null)
    {
        $ratting = $this->ratings()
            ->join('metrics', 'metrics.id', '=', 'ratings.metric_id')
            ->join('users', 'users.id', '=', 'ratings.user_id')
            ->where('ratings.project_id', $project)
            ->when($age, function ($query) use ($age) {
                return $query->where('users.age', $age);
            })
             ->avg('ratings.rating');

        return null == $ratting ? 0 : (float) $ratting * 7;
    }
}
