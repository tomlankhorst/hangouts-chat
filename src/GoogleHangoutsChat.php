<?php

namespace NotificationChannels\Hangouts;

use Google_Client;
use Google_Service_HangoutsChat;
use Google_Service_HangoutsChat_Message;
use NotificationChannels\GoogleHangoutsChatChannel\GoogleHangoutsChatMessage;

class GoogleHangoutsChat
{
    protected $chat;

    /**
     * GoogleHangoutsChat constructor.
     * @param array $credentials
     * @throws \Google_Exception
     */
    public function __construct($credentials)
    {
        $client = new Google_Client();
        $client->setAuthConfig($credentials);
        $client->addScope('https://www.googleapis.com/auth/chat.bot');
        $client->authorize();

        $this->chat = new Google_Service_HangoutsChat($client);
    }

    public function spaces()
    {
        return $this->chat->spaces->listSpaces();
    }

    public function send(string $space, GoogleHangoutsChatMessage $message)
    {
        $payload = new Google_Service_HangoutsChat_Message();
        $payload->setText($message->text);

        return $this->chat->spaces_messages->create($space, $payload);
    }
}
