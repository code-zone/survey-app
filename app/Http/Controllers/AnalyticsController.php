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
        $ages = ['60' => 'Above 60 Years', '40' => '41 to 60 Years', '20' => '21 to 40 Years', '10' => 'Below 20 Years'];
        foreach ($this->surveys->all() as $svy) {
            $score = [];
            foreach ($ages as $key => $group) {
                $score['labels'][] = $group;
                $score['data'][] = $svy->rattingByAge($key) / 57.572 * 100;
            }
            $data['series3'][] = [
                    'name' => $svy->project_name,
                    'data' => $score['data'],
                ];
        }
        $data['agelabels'] = array_flatten($ages);

        // Series 2
        $rate = [];
        foreach (Project::all() as $pr) {
            $per = $pr->rattingByAge($age) / 57.572 * 100;
            $rate['data'][] = $per;
            $rate['series'][] = [$pr->project_name, $per];
            $rate['name'][] = $pr->project_name;
        }
        $data['series2'][] = [
            'data' => $rate['series'],
            'name' => 'Overall',
            'type' => 'pie',
        ];
        $data['rates'] = $rate;

        return view('analytics.index', compact('data'));
    }
}
