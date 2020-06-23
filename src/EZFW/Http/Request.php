<?php

namespace EZFW\Http;

class Request {

    public string $method = 'GET';
    public string $path = '/';
    public array $parameters = [];

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        $parsed = parse_url($_SERVER['REQUEST_URI']);
        $this->path = $parsed['path'];
        $this->query = $parsed['query'];
    }

    public static function current() : Request
    {
        return new self();
    }

    public function setParameter(string $name, $value)
    {
        $this->parameters[$name] = $value;
    }
}
