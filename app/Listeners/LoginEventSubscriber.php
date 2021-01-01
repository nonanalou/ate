<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LoginEventSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    public function handleLogin($event)
    {
        Log::info("User {$event->user->id}, {$event->user->name} loggedin");
    }

    public function handleLoginFailed($event)
    {
        Log::info("Failed login with {$event->credentials['email']}");
    }

    public function handleLoginAttempt($event)
    {
        Log::info("Login attempt for, {$event->credentials['email']}");
    }

    public function handlePasswordReset($event)
    {
        Log::info("User {$event->user->name}, {$event->user->name} resset their password");
    }

    public function handleLockout($event)
    {
        Log::warning("Lockout for {$event->request->ip()}");
    }


    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            [LoginEventSubscriber::class, 'handleLogin']
        );

        $events->listen(
            'Illuminate\Auth\Events\Failed',
            [LoginEventSubscriber::class, 'handleLoginFailed']
        );

        $events->listen(
            'Illuminate\Auth\Events\Attempting',
            [LoginEventSubscriber::class, 'handleLoginAttempt']
        );

        $events->listen(
            'Illuminate\Auth\Events\PasswordRestet',
            [LoginEventSubscriber::class, 'handlePasswordReset']
        );

        $events->listen(
            'Illuminate\Auth\Events\Lockout',
            [LoginEventSubscriber::class, 'handleLockout']
        );
    }
}
