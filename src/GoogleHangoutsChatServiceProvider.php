<?php

namespace NotificationChannels\GoogleHangoutsChat;

use Illuminate\Support\ServiceProvider;
use NotificationChannels\GoogleHangoutsChat\GoogleHangoutsChat;

class GoogleHangoutsChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(GoogleHangoutsChatChannel::class)
            ->needs(GoogleHangoutsChat::class)
            ->give(function () {
                $config = config('services.google_hangouts_chat');
                return new GoogleHangoutsChat($config);
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
