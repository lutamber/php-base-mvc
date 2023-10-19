<?php

namespace core;

interface Middleware
{
    /**
     * @return Boolean true if pass or false to interrupt
     */
    public function run(...$args);
}