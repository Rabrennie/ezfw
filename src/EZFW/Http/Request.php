<?php

namespace EZFW\Http;

class Request {
    public static function current() : Request
    {
        return new self();
    }
}
