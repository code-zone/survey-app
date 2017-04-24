<?php

namespace App\Http\Controllers;

use App\Entities\Metric;
use App\Entities\Project;

class AnalyticsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(Project $surveys)
    {
        $this->middleware('auth');
        $this->surveys = $surveys;
    }

    /**
     * Show the application dashboard.
     *
     * @param Project $survey Inject Survey model
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Metric $metrics)
    {
        $data = [];
        $age = request('age', false);
        foreach ($metrics->all() as $metric) {
            $score = [];
            foreach ($this->surveys->all() as $survey) {
                $score['labels'][] = $survey->project_name;
                $score['data'][] = $metric->scoreByAge($survey->id, $age);
            }
            $data['labels'] = $score['labels'];
            $data['series'][] = [
                'name' => $metric->metric_name,
                'data' => $score['data'],
            ];
        }
        // Series 2
        $rate = [];
        foreach ($this->surveys->all() as $pr) {
            $rate['data'][] = $pr->rattingByAge($age);
            $rate['name'][] = $pr->project_name;
        }
        $data['series2'][] = [
            'data' => $rate['data'],
            'name' => 'Overall',
            'type' => 'pie',
        ];
        $data['rates'] = $rate;

        return view('analytics.index', compact('data'));
    }
}
