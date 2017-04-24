<?php

namespace App\Http\Controllers;

/**
 * Business logic for the front-end part of the application.
 */
class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     **/
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @GET('/')
     *
     * Display the Landing page for the app
     *
     * @return Illuminate\Http\Response
     **/
    public function home()
    {
        return view('welcome');
    }

    /**
     * @GET('/contact')
     *
     * SHow vie for displaying contact page
     *
     * @return Illuminate\Http\Response
     **/
    public function contactUs()
    {
        return view('contact');
    }
}
