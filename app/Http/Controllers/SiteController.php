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
        //$this->middleware('guest');
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
     * @POST('send-feedback')
     *
     * Send user feedback notification
     *
     * @param Illuminate\Http\Request $request current request instance
     **/
    public function sendFeedback(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);
        try {
            // Notify user that their feedback hass been received
            resolve('Illuminate\Contracts\Mail\Mailer')
            ->to($request->get('email'), $request->get('name'))
            ->send((new FeedbackSent($request))->subject('Your Feedback Has Been Received'));
            // Send User feedback to site admin
            resolve('Illuminate\Contracts\Mail\Mailer')
            ->to(env('ADMIN_EMAIL', 'mcanelson@gmail.com'), env('ADMIN_NAME', 'Nelson Masese'))
            ->send((new FeedbackReceived($request))->subject('New User Feedback'));
            $request->session()->flash('response', 'Your Feedback Has Been Received');
        } catch (\Swift_TransportException $e) {
            $request->session()->flash('error', 'Failed to send your feedback, please check if your have an active internet connection');

            return back()->withInput();
        }

        return back();
    }
}
