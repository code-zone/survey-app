<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FeedbackSent;
use App\Mail\FeedbackReceived;

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

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function sendFeedback(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);
       // Notify user that their feedback hass been received
        resolve('Illuminate\Contracts\Mail\Mailer')
        ->to($request->get('email'), $request->get('name'))
        ->subject('Your Feedback Has Been Received')
        ->send(new FeedbackSent($request));
        // Send User feedback to site admin
        resolve('Illuminate\Contracts\Mail\Mailer')
        ->to(env('ADMIN_EMAIL', 'wizqydy@gmail.com'), env('ADMIN_NAME', 'The Weezqyd'))
        ->subject('New User Feedback')
        ->send(new FeedbackReceived($request));
        $request->session()->flash('response', 'Your Feedback Has Been Received');

        return back();
    }
}
