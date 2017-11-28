<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'needsRole:Admin']);
    }

    /**
     * @GET('/')
     *
     * Show view for displaying site settings
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        return view('settings.index');
    }

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function store(Request $request)
    {
        foreach ($request->only('author', 'phone', 'secondary_phone', 'about', 'email') as $key => $value) {
            \DB::table('configs')->where('key', $key)->update(['value' => $value]);
        }

        return back();
    }
}
