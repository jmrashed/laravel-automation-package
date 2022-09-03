<?php

namespace Jmrashed\Automation\Facades;

use Illuminate\Support\Facades\Facade;

class AutomationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'automation';
    }
}
