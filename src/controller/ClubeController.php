<?php

namespace app\controller;

use app\service\ClubeService;
use app\model\Clube;
use app\model\ConsumirRecursoRequest;

class ClubeController {

    public static function listarTodosClubes($response) {
        try {
            $service = new ClubeService();
            $responseBody = $service->listarTodosClubes();
            return $response->setStatus(200)->setBody($responseBody)->toJson();
        } catch (\Exception $e) {
            return $response->setStatus(400)->setBody($e->getMessage())->toJson();
        }
    }

    public static function criarClube($requestBody, $response) {
        try {
            $clube = Clube::deserialize($requestBody);
            $service = new ClubeService();
            $service->criarClube($clube);
            return $response->setStatus(200)->setBody("ok")->toJson();
        } catch (\Exception $e) {
            return $response->setStatus(400)->setBody($e->getMessage())->toJson();
        }
    }

    public static function consumirRecurso($requestBody, $response) {
        try {
            $consumirRecursoRequest = ConsumirRecursoRequest::deserialize($requestBody);
            $service = new ClubeService();
            $consumirRecursoResponse = $service->consumirRecurso($consumirRecursoRequest);
            return $response->setStatus(200)->setBody($consumirRecursoResponse)->toJson(); 
        } catch (\Exception $e) {
            return $response->setStatus(400)->setBody($e->getMessage())->toJson();
        }
    }
}