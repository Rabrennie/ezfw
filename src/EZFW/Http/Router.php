<?php

namespace EZFW\Http;

class Router
{
    public const METHOD_GET = "GET";

    public $GET = [];

    public function add(string $method, string $route, callable $callback)
    {
        $this->$method[$route] = $callback;
    }

    public function resolve(Request $request)
    {
        return $this->{$request->method}[$request->path];
    }
}