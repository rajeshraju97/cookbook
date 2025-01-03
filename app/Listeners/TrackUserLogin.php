<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class TrackUserLogin
{
    /**
     * Handle the event.
     *
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Example: Update last_active_at or log activity
        $event->user->update(['last_active_at' => now()]);

        // Example: Log the login event
        Log::info('User logged in: ', ['email' => $event->user->email]);
    }
}