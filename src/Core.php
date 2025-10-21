<?php

declare(strict_types=1);

namespace Brain;

class Core
{
    public function workingDirectory(): string
    {
        $result = getcwd();

        if (! $result) {
            throw new \RuntimeException('Unable to determine the current working directory.');
        }

        return $result;
    }
}
