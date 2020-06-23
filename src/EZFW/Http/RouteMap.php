<?php

namespace EZFW\Http;

class RouteMap {
    public array $children = [];
    public string $routePart = '';
    public bool $isParameter = false;
    public $methods = [];

    public function __construct(string $routePart)
    {
        $re = '/{(.*)}/m';
        preg_match_all($re, $routePart, $matches, PREG_SET_ORDER, 0);
        if (count($matches) > 0) {
            $this->isParameter = true;
            $this->routePart = $matches[0][1];
        } else {
            $this->routePart = $routePart;
        }
    }

    public function addChild(RouteMap $route)
    {
        $this->children[$route->routePart] = $route;
    }
}