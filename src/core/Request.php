<?php

namespace app\core;

class Request {

    private static string $ROOT_PATH = "/api-rest-php/public";
    
    public function getPath() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if (str_contains($path, self::$ROOT_PATH)) {
            $path = substr($path, strlen(self::$ROOT_PATH), strlen($path));
        }
        $questionMarkPosition = strpos($path, '?');
        if ($questionMarkPosition === false) {
            return $path;
        }
        return substr($path, 0, $questionMarkPosition);
    }

    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody() {
        $inputJSON = file_get_contents('php://input');
        return json_decode($inputJSON, true);
    }
}