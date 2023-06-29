<?php

namespace app\core;

class Application {
    public static string $ROOT_DIR;
    public Router $router;
    private Request $request;
    private Response $response;

    public function __construct($ROOT_DIR) {
        self::$ROOT_DIR = $ROOT_DIR;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        return $this->router->resolve();
    }
}
