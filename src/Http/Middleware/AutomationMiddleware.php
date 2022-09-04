<?php

namespace Jmrashed\Automation\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AutomationMiddleware  extends Middleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
