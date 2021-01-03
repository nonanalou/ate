<?php

namespace App\Providers;

use App\Models\Attachment;
use App\Observers\AttachmentObserver;
use App\Listeners\LoginEventSubscriber;
use App\Models\Post;
use App\Models\Project;
use App\Models\TaskForce;
use App\Models\User;
use App\Observers\PostObserver;
use App\Observers\ProjectObserver;
use App\Observers\TaskForceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $subscribe = [
        LoginEventSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        TaskForce::observe(TaskForceObserver::class);
        Project::observe(ProjectObserver::class);
        Post::observe(PostObserver::class);
        Attachment::observe(AttachmentObserver::class);
    }
}
