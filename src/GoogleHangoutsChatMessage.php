<?php

namespace NotificationChannels\GoogleHangoutsChatChannel;


class GoogleHangoutsChatMessage
{
    public $text;
    public $space;

    public function __construct($space = null, $text = null)
    {
        $this->space = $space;
        $this->text = $text;
    }


    public function space($text)
    {
        $this->text = $text;

        return $this;
    }


    public function text($text)
    {
        $this->text = $text;

        return $this;
    }
}
