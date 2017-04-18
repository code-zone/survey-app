<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onFailedLogin($event)
    {
        if (!is_null($event->user)) {
            $event->user->log()->create(
                [
                'icon' => 'fa fa-ban',
                'type' => 'pink',
                'group' => 'auth',
                'title' => 'Failed Login Attempt',
                'details' => 'A suspicious log in attempt to this account was detected if this was not you please consider taking immediate action',
                'ip' => request()->server->get('REMOTE_ADDR'),
                'user_agent' => request()->server->get('HTTP_USER_AGENT'),
                ]
            );
        }
    }

//end onFailedLogin()

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        $event->user->log()->create(
            [
             'icon' => 'fa fa-sign-in',
             'type' => 'teal',
             'group' => 'auth',
                'title' => 'Successful Log in',
                'details' => 'Account log in success, if this was not you please consider taking immediate action',
                'ip' => request()->server->get('REMOTE_ADDR'),
                'user_agent' => request()->server->get('HTTP_USER_AGENT'),
            ]
        );
    }

//end onUserLogin()

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        $event->user->log()->create(
                [
                'icon' => 'fa fa-sign-out',
                'type' => 'primary',
                'group' => 'auth',
                'title' => 'Log Out from Account',
                'details' => 'Logged out of this account',
                'ip' => request()->server->get('REMOTE_ADDR'),
                'user_agent' => request()->server->get('HTTP_USER_AGENT'),
        ]
        );
    }

//end onUserLogout()

    /**
     * Log Writer.
     *
     * Persist activity details to the database
     *
     * @param array $data Associative array of log data
     */
    protected function logActivity(array $data)
    {
        if (auth()->check()) {
            user()->log()->create($data);
        }
    }

//end logActivity()

    /**
     * Register the listeners for the subscriber.
     *
     * @param Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            __CLASS__.'@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            __CLASS__.'@onUserLogout'
        );

        $events->listen(
            'Illuminate\Auth\Events\Failed',
            __CLASS__.'@onFailedLogin'
        );
    }

//end subscribe()
}//end class
