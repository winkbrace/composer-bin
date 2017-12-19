<?php

namespace Acme\Bridge\Laravel4;

use Symfony\Component\Console\Input\ArrayInput;

class Command extends \Illuminate\Console\Command
{
    protected $name = 'foo';

    public function __construct()
    {
        parent::__construct();

        $this->input = new ArrayInput([]);
    }
}
