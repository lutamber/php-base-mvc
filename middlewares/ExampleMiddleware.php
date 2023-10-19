<?php

namespace middlewares;

use \core\Middleware;

class ExampleMiddleware implements Middleware
{
    public function run(...$args)
    {
        return true;
    }
}