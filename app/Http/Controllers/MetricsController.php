<?php

namespace App\Http\Controllers;

use Auth;
use App\Entities\Metric;
use App\Entities\Project;
use Illuminate\Http\Request;
use App\Entities\Constraint;

class MetricsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param Metric $metric
     **/
    public function __construct(Metric $metrics)
    {
        $this->middleware('auth');
        $this->metrics = $metrics;
    }

    /**
     * Show software quality metrics.
     *
     * @return Response
     **/
    public function index()
    {
        $metrics = $this->metrics->all();

        return view('metrics.index', compact('metrics'));
    }

    /**
     * Show form for creatic metric.
     *
     * @return Response
     **/
    public function create()
    {
        return view('metrics.create');
    }

    /**
     * Show view for editing software metric.
     *
     * @param Metric $metric
     **/
    public function edit(Metric $metric)
    {
        return view('metrics.EditMetric', compact('metric'));
    }

    /**
     * Save metric to data store.
     *
     * @param Request $request Http request
     *
     * @return Response Http Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['metric_name' => 'required', 'score_index' => 'required|numeric', 'details' => 'required']);
        $this->metrics->create($request->all());

        return redirect(route('metrics.index'));
    }

    /**
     * Update metric on data store.
     *
     * @param Metric  $metric  Metric to be updated
     * @param Request $request Http request
     *
     * @return Response Http Response
     */
    public function update(Metric $metric, Request $request)
    {
        $this->validate($request, ['metric_name' => 'required', 'score_index' => 'required|numeric', 'details' => 'required']);
        $metric->update($request->all());

        return redirect(route('metrics.index'));
    }

    /**
     * Create metric constraints.
     *
     * @param Metric $metric
     **/
    public function addConstraint(Metric $metric)
    {
        $this->validate(request(), ['constraint_name' => 'required']);
        $metric->constraints()->create(request()->only('constraint_name'));

        return back();
    }

    /**
     * Create metric constraints.
     *
     * @param Metric $metric
     **/
    public function updateConstraint(Constraint $constraint)
    {
        $this->validate(request(), ['constraint_name' => 'required']);
        $constraint->update(request()->only('constraint_name'));

        return back();
    }

    /**
     * Create metric constraints.
     *
     * @param Metric $metric
     **/
    public function addMetricScore(Metric $metric)
    {
        $this->validate(request(), ['score' => 'required|numeric|between:0,10|', 'comment' => 'required']);
        $metric->scores()->create(request()->only('score', 'comment'));

        return back();
    }

    /**
     * Show survey constraints.
     *
     * @param Metric $metric
     **/
    public function showConstraints(Metric $metric, Project $project)
    {
        $user = auth()->user();
        $scores = $metric->scores()->orderBy('score', 'ASC')->get();
        $ratings = $user->ratings()->where('metric_id', $metric->id)->where('project_id', $project->id)->get();

        return view('projects.voting', compact('scores', 'metric', 'ratings', 'project'));
    }

    /**
     * Show Metric constraints.
     *
     * @param Metric $metric
     **/
    public function editConstraints(Metric $metric)
    {
        return view('metrics.MetricConstraints', compact('metric'));
    }

    /**
     * Save metric ratings submited by user.
     *
     * @param Metric $metric
     *
     * @return Response
     **/
    public function saveRatings(Metric $metric)
    {
        $this->validate(request(), ['constraints' => 'required|array']);
        $survey = request()->get('project_id');
        Auth::user()->ratings()->where(['metric_id' => $metric->id, 'project_id' => $survey])->delete();
        foreach (request()->get('constraints') as $key => $value) {
            $metric->ratings()->create(['user_id' => Auth::user()->id, 'constraint_id' => $key, 'rating' => $value, 'project_id' => $survey]);
        }
        session()->put('message', 'Thank You for your particpation in this survey, You feedback is highly appreciated');

        return redirect(request()->get('next'));
    }
}
