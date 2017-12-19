<?php

namespace Acme;

use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    /** @test */
    public function it_should_echo_the_message()
    {
        $hello = new Message('Hello, world!');

        $this->assertEquals('Hello, world!', $hello);
    }
}
