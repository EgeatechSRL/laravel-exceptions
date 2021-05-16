<?php

namespace EgeaTech\LaravelExceptions\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelExceptions extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-exceptions';
    }
}
