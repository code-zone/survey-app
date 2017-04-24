<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Global metric for measurement.
     **/
    const INDEX = 5.912;
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

    /**
     * undocumented function.
     *
     * @author
     **/
    public function ratting($user = null)
    {
        $rating = 0;
        foreach ($this->metrics as $value) {
            $rating += ($value->metric->score($this->id, $user) * $value->metric->score_index);
        }

        return $rating > 0 ? $rating + self::INDEX : 0;
    }

    /**
     * undocumented function.
     *
     * @author
     **/
    public function rattingByAge($age = null)
    {
        $rating = 0;
        foreach ($this->metrics as $value) {
            $rating += ($value->metric->scoreByAge($this->id, $age) * $value->metric->score_index);
        }

        return $rating > 0 ? $rating + self::INDEX : 0;
    }
}
