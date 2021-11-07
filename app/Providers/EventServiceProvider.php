<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen =
    [
        \Illuminate\Auth\Events\Registered::class =>
        [
            \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * @return void
     */
    // public function register() {}

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen(function (\Illuminate\Notifications\Events\NotificationSent $notif) {

            if ($notif->channel === 'database' && method_exists($notif->notification, 'broadcastType')) {

                $notif->response->type = $notif->notification->broadcastType();
                $notif->response->save();
            }
        });
    }

    /**
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
