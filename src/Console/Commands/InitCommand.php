<?php

declare(strict_types=1);

namespace Brain\Console\Commands;

use Brain\Console\Traits\StubGeneratorTrait;
use Brain\Support\Brain;
use Illuminate\Console\Command;

class InitCommand extends Command
{
    use StubGeneratorTrait;

    protected $signature = 'init';

    protected $description = 'Initialize Brain Configuration';

    public function handle(): int
    {
        try {

        } catch (\Exception $e) {
            $this->components->error($e->getMessage());
            return 1;
        }

        return 0;
    }

    protected function generate()
    {

    }
}

