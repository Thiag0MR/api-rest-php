<?php

namespace app\controller;

use app\service\RecursoService;

class RecursoController {

    public static function listarTodosRecursos($response) {
        try {
            $service = new RecursoService();
            $responseBody = $service->listarTodosRecursos();
            return $response->setStatus(200)->setBody($responseBody)->toJson();
        } catch (\Exception $e) {
            return $response->setStatus(400)->setBody($e->getMessage())->toJson();
        }
    }
}