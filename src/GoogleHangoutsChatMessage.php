<?php

namespace NotificationChannels\GoogleHangoutsChat;


class GoogleHangoutsChatMessage
{
    /** @var string */
    public $text;

    /** @var \Google_Service_HangoutsChat_Space  */
    public $space;

    public function __construct($space = null, $text = null)
    {
        $this->space = $space;
        $this->text = $text;
    }


    /**
     * @param \Google_Service_HangoutsChat_Space $space
     * @return $this
     */
    public function space($space)
    {
        $this->space = $space;

        return $this;
    }


    /**
     * @param string $text
     * @return $this
     */
    public function text($text)
    {
        $this->text = $text;

        return $this;
    }
}
