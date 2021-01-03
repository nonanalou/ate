<?php

namespace App\Observers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AttachmentObserver
{
    /**
     * Handle the Attachment "created" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function created(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "updated" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function updated(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function deleted(Attachment $attachment)
    {
        Storage::delete($attachment->path);
        Log::info("Attachment {$attachment->id} and file {$attachment->path} deleted");
    }

    /**
     * Handle the Attachment "restored" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function restored(Attachment $attachment)
    {
        //
    }

    /**
     * Handle the Attachment "force deleted" event.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return void
     */
    public function forceDeleted(Attachment $attachment)
    {
        //
    }
}
