<?php

use Acme\Bridge\Laravel4\Laravel4Message;
use Acme\Message;
use PHPUnit\Framework\TestCase;

class Laravel4MessageTest extends TestCase
{
    /** @test */
    public function it_should_echo_the_message()
    {
        $hello = new Laravel4Message(new Message('Hello, world!'));

        $this->assertEquals('Hello, world!', $hello);
    }

    /** @test */
    public function it_should_get_l4_options()
    {
        $hello = new Laravel4Message(new Message('Hello, world!'));

        $this->assertSame([], $hello->getOptions());
    }

    /** @test */
    public function it_should_not_have_l5_options()
    {
        $hello = new Laravel4Message(new Message('Hello, world!'));
        $command = $hello->getCommand();

        $this->expectExceptionMessage('Call to undefined method Acme\Bridge\Laravel4\Command::options()');
        $command->options(); // this method was added in Laravel 5
    }
}
