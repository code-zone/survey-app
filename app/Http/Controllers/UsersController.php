<?php

namespace App\Http\Controllers;

use App\User;
use App\Entities\Metric;
use App\Entities\Project;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param User $user User model
     */
    public function __construct(User $user, Project $survey, Metric $metrics)
    {
        $this->middleware(['auth', 'needsRole:Admin'])->except(['show', 'editProfile', 'updateAbout', 'updateProfile']);
        $this->users = $user;
        $this->metrics = $metrics;
        $this->surveys = $survey;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users->paginate();

        return view('users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
             'name' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users',
             'phone_number' => 'required|max:255|unique:users',
             'password' => 'required|min:6|confirmed',
             'role' => 'required|in:Admin,Respondent',
            ]);
        $user = $this->users->create($request->all());
        $user->attachRole(resolve('defender')->findRole($request->role));
        $request->session()->put('message', 'User account was successfully added');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user Injected user model
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = [];
        foreach ($this->metrics->all() as $metric) {
            $score = [];
            foreach ($this->surveys->all() as $survey) {
                $score['labels'][] = $survey->project_name;
                $score['data'][] = $metric->score($survey->id, $user->id);
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
            $rate['data'][] = $pr->ratting($user->id) / 57.572 * 100;
            $rate['name'][] = $pr->project_name;
        }
        $data['series2'][] = [
            'data' => $rate['data'],
            'name' => 'Overall',
            'type' => 'column',
        ];
        $data['rates'] = $rate;

        return view('users.Profile', compact('user', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user Injected user model
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.EditUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
             'name' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users,email,'.$user->id,
             'phone_number' => 'required|max:255|unique:users,phone_number,'.$user->id,
             'role' => 'required|in:Admin,Respondent',
            ]);
        $user->update($request->all());
        $user->syncRoles([]);
        $user->attachRole(resolve('defender')->findRole($request->role));
        $request->session()->put('message', 'User profile was successfuly updated');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user Injected user model
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $message = 'Ooops! It is imposible to delete your own account';
        if ($user->id != auth()->user()->id) {
            $user->delete();
            $message = 'User was successfully deleted from the datastore';
        }
        session()->put('message', $message);

        return redirect()->route('users.index');
    }

    /**
     * Block a user account from accessing the dashboard.
     *
     * @param User $user Injected user model
     *
     * @return \Illuminate\Http\Response
     */
    public function block(User $user)
    {
        $message = 'Ooops! It is imposible to deny access to your own account';
        if ($user->id != auth()->user()->id) {
            $user->status = 0;
            $user->save();
            $message = 'User was successfully blocked from accessing the dashboard';
        }
        session()->put('message', $message);

        return back();
    }

    /**
     * Unblock a user account.
     *
     * @param User $user Injected user model
     *
     * @return \Illuminate\Http\Response
     */
    public function unblock(User $user)
    {
        $message = 'Ooops! It is imposible to manage access for your own account';
        if ($user->id != auth()->user()->id) {
            $user->status = 1;
            $user->save();
            $message = 'User was successfully unblocked';
        }
        session()->put('message', $message);

        return back();
    }

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function updateAbout(User $user)
    {
        $user->update(request()->only('about'));

        return back();
    }
}
