<?php

namespace EZFW\Http;

abstract class Middleware
{
    abstract public function handle(Request $request, Response $response, callable $next);
}
