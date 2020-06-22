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

    public function resolve(string $method, string $url)
    {
        return $this->$method[$url];
    }
}