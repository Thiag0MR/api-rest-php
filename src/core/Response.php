<?php

namespace app\core;

ini_set('serialize_precision','-1');

class Response {
    private mixed $body;

    public function setStatus($status) {
        http_response_code($status);
        return $this;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

    public function toJson() {
        header("Content-Type: application/json;charset=UTF-8");
        return json_encode($this->body, JSON_UNESCAPED_UNICODE);
    }
}