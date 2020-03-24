<?php

namespace NotificationChannels\GoogleHangoutsChatChannel;

use Illuminate\Notifications\Notification;
use NotificationChannels\Hangouts\GoogleHangoutsChat;
use NotificationChannels\GoogleHangoutsChatChannel\Exceptions\CouldNotSendNotification;

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
        $message = $notification->{'toHangouts'}($notifiable);

        if (empty($message->space)) {
            $space = ($notifiable->routeNotificationFor('googleHangouts'));

            if (empty($space)) {
                throw new CouldNotSendNotification('Notifiable must have a routeNotificationFor() space');
            }
            return $this->hangouts->send($space, $message);
        } else {
            return $this->hangouts->send($message->space, $message);
        }
    }
}
