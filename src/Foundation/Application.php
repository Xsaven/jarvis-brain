<?php

declare(strict_types=1);

namespace Brain\Foundation;

use Illuminate\Container\Container;

class Application extends Container
{
    public function runningUnitTests(): bool
    {
        return false;
    }
}

