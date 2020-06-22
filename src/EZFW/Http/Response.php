<?php

namespace EZFW\Http;

class Response {

    public string $body = "";
    public int $response_code = 200;

    public function send()
    {
        http_response_code($this->response_code);
        echo $this->body;
    }

    public function text(string $body)
    {
        $this->body = $body;
        return $this;
    }

    public function notFound(string $body)
    {
        $this->response_code = 404;
        $this->body = $body;
        return $this;
    }
}
