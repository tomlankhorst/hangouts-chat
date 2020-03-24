<?php

namespace NotificationChannels\GoogleHangoutsChatChannel\Test;

use NotificationChannels\GoogleHangoutsChat\GoogleHangoutsChat;
use NotificationChannels\GoogleHangoutsChat\GoogleHangoutsChatMessage;
use PHPUnit\Framework\TestCase;

class SpaceMessageTest extends TestCase
{
    /** @test
     * @throws \Google_Exception
     */
    public function it_is_possbile_send_a_message_to_space()
    {
        $config = __DIR__ . '/key.json';
        $this->assertTrue(file_exists($config));

        $json = file_get_contents($config);
        $config = json_decode($json, true);
        $this->assertTrue(is_array($config));

        $hangouts = new GoogleHangoutsChat($config);
        $spaces = $hangouts->spaces();

        foreach ($spaces->getSpaces() as $space) {
            $message = new GoogleHangoutsChatMessage();
            $message->space($space);
            $message->text('Teste de BOT 123');

            $sendResult = $hangouts->send($message);
            echo json_encode($sendResult);
        }
    }
}
