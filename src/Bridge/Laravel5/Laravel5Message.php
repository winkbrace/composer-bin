<?php

namespace Acme\Bridge\Laravel5;

use Acme\Message;

class Laravel5Message
{
    /** @var Message */
    private $msg;

    /**
     * @param Message $msg
     */
    public function __construct(Message $msg)
    {
        $this->msg = $msg;
    }

    public function getOptions(): array
    {
        // options() was added in L5
        return (new Command())->options();
    }

    public function __toString(): string
    {
        return $this->msg->__toString();
    }
}
