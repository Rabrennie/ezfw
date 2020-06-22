<?php

namespace EZFW\Http;

class Response {

    public string $body = "";

    public function send()
    {
        echo $this->body;
    }
}
