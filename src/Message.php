<?php

namespace Acme;

class Message
{
    /** @var string */
    private $msg;

    /**
     * @param string $msg
     */
    public function __construct(string $msg)
    {
        $this->msg = $msg;
    }

    public function __toString(): string
    {
        return $this->msg;
    }
}
