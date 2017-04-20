<?php

namespace App\Http\Controllers;

use App\Entities\Metric;
use App\Entities\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     **/
    public function __construct(Project $projects)
    {
        $this->middleware('auth');
        $this->projects = $projects;
    }

    /**
     * Show projects.
     *
     * @return Response
     **/
    public function index()
    {
        $projects = $this->projects->paginate();

        return view('projects.index', compact('projects'));
    }

    /**
     * show view for creating a new project.
     *
     * @return Response
     **/
    public function create()
    {
        return view('projects.create');
    }

    /**
     * show view for editing a survey.
     *
     * @return Response
     **/
    public function edit(Project $project)
    {
        return view('projects.EditSurvey', compact('project'));
    }

    /**
     * show view for editing a survey.
     *
     * @return Response
     **/
    public function startSurvey(Project $project)
    {
        if (session()->has()) {
            return redirect($project->nextPageUlr(session('url')));
        }
    }

    /**
     * Update the project in the database.
     *
     * @param Request $reques
     *
     * @return Response
     **/
    public function update(Project $project, Request $request)
    {
        $this->validate($request, ['project_name' => 'required|unique:projects,project_name,'.$project->id]);
        $project->update($request->all());
        $this->uploadFile($request, $project);

        return redirect(route('projects.index'));
    }

    /**
     * Save the project to the database.
     *
     * @param Request $reques
     *
     * @return Response
     **/
    public function store(Request $request)
    {
        $this->validate($request, ['project_name' => 'required', 'details' => 'required']);
        $project = $this->projects->create($request->all());
        $this->uploadFile($request, $project);

        return redirect(route('projects.index'));
    }

    /**
     * Show form for adding metrics.
     *
     * @param Project $project
     *
     * @return Response description
     */
    public function addMetrics($id)
    {
        $metrics = Metric::all();
        $project = $this->projects->with('metrics')->findOrFail($id);

        return view('projects.addSurveyMetrics', compact('metrics', 'project'));
    }

    /**
     * Add metrics to measure software quality.
     *
     * @param Project $project
     *
     * @return Response description
     */
    public function saveMetrics(Project $project)
    {
        $this->validate(request(), ['metrics' => 'required|array']);
        $project->metrics()->delete();
        foreach (request()->get('metrics') as $metric) {
            $project->metrics()->create(['metric_id' => $metric]);
        }

        return redirect(route('projects.index'));
    }

    /**
     * Show survey metrics.
     *
     * @param Project $project
     *
     * @return Response description
     */
    public function showMetrics(Project $project)
    {
        $user = auth()->user();
        $user_id = $user->hasRole('Admin') ? false : $user->id;

        return view('projects.rating', compact('project', 'user_id'));
    }

    /**
     * Save image to the filesystem.
     *
     * @param Request $request HTTP Request
     * @param Project $project Survey Object
     **/
    protected function uploadFile(Request $request, Project $project)
    {
        if ($request->file('image')) {
            $path = $request->image->store('public/images');
            $project->image = str_replace('public', 'storage', $path);
            $project->save();
        }
    }
}
