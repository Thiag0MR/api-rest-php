<?php

namespace app\controller;

use app\service\ClubeService;

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
}