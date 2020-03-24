<?php

namespace NotificationChannels\GoogleHangoutsChat;

use Illuminate\Notifications\Notification;
use NotificationChannels\GoogleHangoutsChat\Exceptions\CouldNotSendNotification;

class GoogleHangoutsChatChannel
{
    /**
     * @var GoogleHangoutsChat
     */
    protected $hangouts;


    public function __construct(GoogleHangoutsChat $hangouts)
    {
        $this->hangouts = $hangouts;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return \Google_Service_HangoutsChat_Message
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        /** @var GoogleHangoutsChatMessage $message */
        $message = $notification->{'toHangoutsChat'}($notifiable);

        if (empty($message->space)) {
            $space = ($notifiable->routeNotificationFor('hangoutsChat'));

            if (empty($space)) {
                throw new CouldNotSendNotification('Notifiable must have a routeNotificationFor() space');
            }
            return $this->hangouts->send($message);
        } else {
            return $this->hangouts->send($message);
        }
    }
}
