<?php

namespace EZFW;

use EZFW\Http\Kernel;
use EZFW\Http\Request;
use EZFW\Http\Router;

class App
{

    private static App $instance;

    private Kernel $kernel;

    public function __construct()
    {
        $this->kernel = Kernel::boot();
    }

    public static function boot(): App
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function handle(Request $request)
    {
        $response = $this->kernel->handle($request);
        $response->send();
    }

    public function before($middleware)
    {
        $this->kernel->addBeforeMiddleware($middleware);
        return $this;
    }

    public function after($middleware)
    {
        $this->kernel->addAfterMiddleware($middleware);
        return $this;
    }

    public function get(string $route, callable $callback)
    {
        $this->kernel->router->add(Router::METHOD_GET, $route, $callback);
        return $this;
    }

    public function post(string $route, callable $callback)
    {
        $this->kernel->router->add(Router::METHOD_POST, $route, $callback);
        return $this;
    }

    public function put(string $route, callable $callback)
    {
        $this->kernel->router->add(Router::METHOD_PUT, $route, $callback);
        return $this;
    }

    public function delete(string $route, callable $callback)
    {
        $this->kernel->router->add(Router::METHOD_DELETE, $route, $callback);
        return $this;
    }
}
