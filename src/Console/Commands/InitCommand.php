<?php

declare(strict_types=1);

namespace Brain\Console\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{
    protected $signature = 'init';

    protected $description = 'Initialize Brain Configuration';

    public function handle()
    {
        dd();
    }
}

