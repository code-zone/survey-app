<?php

namespace App\Http\Controllers;

use App\Entities\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Project $survey Inject Survey model
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $surveys)
    {
        $data = [];
        foreach ($surveys->all() as $survey) {
            $score = [];
            foreach ($survey->metrics as $metric) {
                $score['labels'][] = $metric->metric->metric_name;
                $score['data'][] = $metric->metric->score($survey->id);
            }
            $data['labels'] = $score['labels'];
            $data['series'][] = [
                'name' => $survey->project_name,
                'data' => $score['data'],
            ];
        }

        return view('home', compact('data'));
    }
}
