<?php

namespace Tests;

use EZFW\Http\Request;
use Mockery;

function getRequestDouble($method = 'GET', $path = '/')
{
    $double = Mockery::mock(Request::class);
    $double->method = $method;
    $double->path = $path;

    return $double;
}