<?php

namespace app\service;

use app\dao\RecursoDao;

class RecursoService {

    private RecursoDao $recursoDao;

    public function __construct() {
        $this->recursoDao = new RecursoDao();
    }

    public function listarTodosRecursos() {
        return $this->recursoDao->selecionarTodosRecursos();
    }
}