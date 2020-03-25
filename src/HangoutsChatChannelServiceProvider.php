<?php

namespace Illuminate\Notifications;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\GoogleHangoutsChat\HangoutsChatChannel;

class HangoutsChatChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('hangoutsChat', function ($app) {
                return new HangoutsChatChannel($app->make(HttpClient::class));
            });
        });
    }
}
