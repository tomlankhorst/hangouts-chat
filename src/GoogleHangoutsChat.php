<?php

namespace NotificationChannels\GoogleHangoutsChat;

use Google_Client;
use Google_Service_HangoutsChat;
use Google_Service_HangoutsChat_Message;

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

    public function send(GoogleHangoutsChatMessage $message)
    {
        $payload = new Google_Service_HangoutsChat_Message();
        $payload->setText($message->text);

        return $this->chat->spaces_messages->create($message->space->name, $payload);
    }
}
