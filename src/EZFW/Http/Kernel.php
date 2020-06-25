<?php

namespace EZFW\Http;

class Kernel
{
    public Response $response;
    public Router $router;
    public array $beforeMiddleware = [];
    public array $afterMiddleware = [];

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
        $this->callMiddleware($this->beforeMiddleware, $request);

        $cb = $this->router->resolve($request);

        if (!isset($cb)) {
            $this->response->notFound('not found');
        } else {
            $this->response = $cb($request, $this->response);
        }

        $this->callMiddleware($this->afterMiddleware, $request);

        return $this->response;
    }

    public function addBeforeMiddleware(callable $middleware)
    {
        $this->beforeMiddleware[] = $middleware;
    }

    public function addAfterMiddleware(callable $middleware)
    {
        $this->afterMiddleware[] = $middleware;
    }

    protected function callMiddleware(array $middlewares, Request $request)
    {
        foreach ($middlewares as $middleware) {
            $callNext = false;
            $middleware($request, $this->response, function (Request $request, Response $response) use (&$callNext) {
                $this->response = $response;
                $callNext = true;
            });

            if (!$callNext) {
                break;
            }
        }
    }

}
