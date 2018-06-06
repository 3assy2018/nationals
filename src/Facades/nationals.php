<?php

namespace m3assy\nationals\Facades;

use Illuminate\Support\Facades\Facade;

class nationals extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nationals';
    }
}
