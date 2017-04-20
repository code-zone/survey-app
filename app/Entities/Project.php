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

    /**
     * undocumented function.
     *
     * @author
     **/
    public function nextPageUrl($key)
    {
        foreach ($this->metrics as $value) {
            $urls[] = route('metric.constraints', [$value->metric_id, $value->project_id]);
        }

        return array_key_exists($key, $urls) ? $urls[$key] : url('dashboard');
    }
}
