<?php

namespace app\core;

class Router{

    private Request $request;
    private Response $response;
    private array $routes = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            return $this->response->setStatus(404)->setBody("Rota inválida")->toJson();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        
        if (is_array($callback)) {
            if ($method === 'post') {
                try {
                    $body = $this->request->getBody() ?? array();
                    return call_user_func($callback, $body, $this->response);
                } catch (\Exception $e) {
                    return $this->response->setStatus(404)->
                        setBody("Erro ao deserializar corpo da requisição.")->toJson();
                }
            } else {
                return call_user_func($callback, $this->response);
            }
        }
    }

    public function renderView($viewName) {
        $file = Application::$ROOT_DIR.'/src/view/'.$viewName.'.php';
        return file_get_contents($file);
    }
}
