<?php

namespace Acme\Bridge\Laravel4;

use Acme\Message;

class Laravel4Message
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
        // options() was not yet available in L4
        return (new Command())->option();
    }

    public function getCommand(): Command
    {
        return new Command();
    }

    public function __toString(): string
    {
        return $this->msg->__toString();
    }
}
