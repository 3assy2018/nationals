<?php

namespace M3assy\Nationals\Facades;

use Illuminate\Support\Facades\Facade;

class Nationals extends Facade
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
