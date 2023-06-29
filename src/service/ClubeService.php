<?php

namespace app\service;

use app\dao\ClubeDao;

class ClubeService {

    private ClubeDao $clubeDao;

    public function __construct() {
        $this->clubeDao = new ClubeDao();
    }

    public function listarTodosClubes() {
        return $this->clubeDao->selecionarTodosClubes();
    }

    public function criarClube($clube) {
        if ($clube->isValid()) {
            return $this->clubeDao->inserir($clube);
        }
    }
}