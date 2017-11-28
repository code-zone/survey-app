<?php

namespace App\Support;

use Iterator;
use App\Entities\Project;
use Illuminate\Database\Eloquent\Collection;

/**
 * URLGenerator class generates the urls for a survey. Starting from the first survey,
 * creating a survey wizard that guides the user through the whole process.
 *
 * @version v1.0.0
 *
 * @author Master Weez <wizqydy@gmail.com>
 *
 * @see https://github.com/code-zone/survey-app Git repository source
 */
class URLGenerator implements Iterator
{
    /**
     * The Current active url.
     *
     * @var int
     **/
    protected $position = 0;
    /**
     * Project model collection.
     *
     * @var Collection
     **/
    protected $projects;

    /**
     * Generated URLs for consumption by the wizard.
     *
     * @var array
     **/
    protected $url;

    /**
     * Create a new instance of URLGenerator,.
     *
     * @param Collection $projects
     **/
    public function __construct(Project $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Get th current value.
     *
     * Return the URL for the current loop position
     *
     * @return string $string The current url
     **/
    public function current()
    {
        return $this->url[$this->key()];
    }

    /**
     * Get the next URL.
     *
     * Increments the current position in the loop and returns the next URL
     *
     * @return string $url The next URL
     **/
    public function next()
    {
        $key = $this->key() + 1;
        session()->put('url_key', $key);

        return $this->valid() ? $this->current() : url('home');
    }

    /**
     * Get the current position in the loop.
     *
     * @return int $key Current loop position
     **/
    public function key()
    {
        return session()->get('url_key', $this->position);
    }

    /**
     * Reset the counter back to the begining.
     **/
    public function rewind()
    {
        return session()->put('url_key', $this->position);
    }

    /**
     * Check key existance.
     *
     * Determines if there is a valid URL for the current key
     *
     * @return bool
     **/
    public function valid()
    {
        return isset($this->url[$this->key()]);
    }

    /**
     * Set up the URLs.
     *
     * Build the urls and set the url property
     *
     * @return URLGenerator $this The current object
     **/
    public function build()
    {
        $this->url = [];
        $projects = session('projects') ?: $this->projects;
        $projects->each(function ($project) {
            $project->metrics->each(function ($metric) {
                $this->url[] = route('metric.constraints', [$metric->metric_id, $metric->project_id]);
            });
        });

        return $this;
    }

    /**
     * Set projects.
     *
     * @param Collection $projects Project collections
     **/
    public function setProjects(Collection $projects)
    {
        $this->projects = $projects;
    }
}
