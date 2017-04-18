<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMetric extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Whitelisted columns for mass asignment.
     *
     * @var array
     */
    protected $fillable = ['metric_id', 'project_id'];

    /**
     * Metric relation.
     *
     * @return Illuminate\Database\ELOQUENT\BelongsToRelation
     **/
    public function metric()
    {
        return $this->belongsTo('App\Entities\Metric');
    }
}
