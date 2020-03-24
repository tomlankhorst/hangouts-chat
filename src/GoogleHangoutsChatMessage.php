<?php

namespace NotificationChannels\GoogleHangoutsChatChannel;


class GoogleHangoutsChatMessage
{
    public $text;
    public $space;

    public function text($text)
    {
        $this->text = $text;

        return $this;
    }
}
