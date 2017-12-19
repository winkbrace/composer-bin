<?php

use Acme\Bridge\Laravel5\Laravel5Message;
use Acme\Message;
use PHPUnit\Framework\TestCase;

class Laravel5MessageTest extends TestCase
{
    /** @test */
    public function it_should_echo_the_message()
    {
        $hello = new Laravel5Message(new Message('Hello, world!'));

        $this->assertEquals('Hello, world!', $hello);
    }

    /** @test */
    public function it_should_get_l5_options()
    {
        $hello = new Laravel5Message(new Message('Hello, world!'));

        $this->assertSame([], $hello->getOptions());
    }
}
