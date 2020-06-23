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
        $cb = $this->router->resolve($request);

        if (!isset($cb)) {
            return $this->response->notFound('not found');
        }

        $this->response = $cb($request, $this->response);
        return $this->response;
    }

}