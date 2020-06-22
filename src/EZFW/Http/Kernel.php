<?php

namespace EZFW\Http;

class Kernel
{
    public Response $response;
    public Router $router;

    public function __construct()
    {
        $this->response = new Response();
        $this->router = new Router();
    }

    public static function boot() : Kernel
    {
        return new self();
    }

    public function handle(Request $request)
    {
        $cb = $this->router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
        $this->response->body = $cb();
        return $this->response;
    }

}