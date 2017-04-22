<?php

namespace App\Http\Controllers;

use App\Entities\Metric;
use App\Entities\Project;

class HomeController extends Controller
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
        $user = auth()->user();
        $user_id = $user->hasRole('Admin') ? false : $user->id;
        foreach ($metrics->all() as $metric) {
            $score = [];
            foreach ($this->surveys->all() as $survey) {
                $score['labels'][] = $survey->project_name;
                $score['data'][] = $metric->score($survey->id, $user_id);
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
            $rate[] = $pr->ratting($user_id);
        }
        $data['series2'][] = [
            'data' => $rate,
            'name' => 'Overall',
            'type' => 'area',
        ];
        return view('home', compact('data'));
    }
}
