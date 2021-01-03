<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $user = auth()->user;
        Log::info("Post {$post->id} was created by User {$user->id}");
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        $user = auth()->user;
        Log::info("Post {$post->id} was updated by User {$user->id}");
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        $user = auth()->user;
        Log::info("Post {$post->id} was deleted by User {$user->id}");
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        $user = auth()->user;
        Log::info("Post {$post->id} was restored by User {$user->id}");
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        $user = auth()->user;
        Log::info("Post {$post->id} was force deleted by User {$user->id}");
    }
}
