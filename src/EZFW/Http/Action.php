<?php

namespace EZFW\Http;

abstract class Action
{
    abstract public function handle(Request $request, Response $response) : Response;
}
