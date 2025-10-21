<?php

namespace Brain\Support;

use Brain\Core;
use Illuminate\Support\Facades\Facade;

/**
 * @see Core
 */
class Brain extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Core::class;
    }
}
