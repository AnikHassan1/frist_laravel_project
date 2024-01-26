<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use App\Mail\UserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostProcessed $event): void
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new UserMail($event->post));
        }
    }
}
