<?php

namespace NotificationChannels\GoogleHangoutsChatChannel\Test;

use NotificationChannels\GoogleHangoutsChatChannel\GoogleHangoutsChatMessage;
use NotificationChannels\Hangouts\GoogleHangoutsChat;
use PHPUnit\Framework\TestCase;

class SpaceMessageCase extends TestCase
{
    /** @test
     * @throws \Google_Exception
     */
    public function it_is_possbile_send_a_message_to_space()
    {
        $config = __DIR__ . '/key.json';
        $this->assertTrue(file_exists($config));

        $json = file_get_contents($config);
        $this->assertTrue($config = json_decode($json, true));

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
