<?php

namespace App\Events;

use App\Entities\Metric;
use App\Entities\Project;
use Illuminate\Queue\SerializesModels;

class AddRatting
{
    use SerializesModels;

    /**
     * Project model instance.
     *
     * @var Project
     **/
    public $survey;

    /**
     * Metric Model instance.
     *
     * @var Metric
     **/
    public $metric;

    /**
     * Create a new event instance.
     */
    public function __construct(Metric $metric, Project $survey)
    {
        $this->metric = $metric;
        $this->survey = $survey;
    }
}
