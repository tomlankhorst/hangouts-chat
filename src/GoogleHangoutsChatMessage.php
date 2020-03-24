<?php

namespace NotificationChannels\GoogleHangoutsChatChannel;


class GoogleHangoutsChatMessage
{
    public $text;
    public $space;

    public function __construct($space, $text)
    {
        $this->space = $space;
        $this->text = $text;
    }


    public function text($text)
    {
        $this->text = $text;

        return $this;
    }
}
