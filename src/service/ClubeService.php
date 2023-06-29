<?php

namespace app\service;

use app\dao\ClubeDao;
use app\dao\RecursoDao;
use app\dao\Database;
use app\model\ConsumirRecursoRequest;
use app\model\ConsumirRecursoResponse;

class ClubeService {

    private ClubeDao $clubeDao;
    private RecursoDao $recursoDao;

    public function __construct() {
        $this->clubeDao = new ClubeDao();
        $this->recursoDao = new RecursoDao();
    }

    public function listarTodosClubes() {
        return $this->clubeDao->selecionarTodosClubes();
    }

    public function criarClube($clube) {
        if ($clube->isValid()) {
            return $this->clubeDao->inserir($clube);
        }
    }

    public function consumirRecurso(ConsumirRecursoRequest $req) : ConsumirRecursoResponse {

        // Verifica se a operação pode ser realizada
        $clube = $this->clubeDao->selecionar($req->getClubeId());
        $recurso = $this->recursoDao->selecionar($req->getRecursoId());

        if ($req->getValorConsumo() < 0.000001) {
            throw new \Exception("O valor de consumo informado é inválido.");
        }

        if ($clube->getSaldoDisponivel() < $req->getValorConsumo()) {
            throw new \Exception("O saldo disponível do clube é insuficiente.");
        }
        
        if($recurso->getSaldoDisponivel() < $req->getValorConsumo()) {
            throw new \Exception("O saldo disponível do recurso é insuficiente.");
        }

        // Realiza a operação de maneira atômica
        $conn = Database::getConnection();
        
        try {
            $conn->beginTransaction();

            $saldoAnterior = $clube->getSaldoDisponivel();
            $saldoAtual = $clube->getSaldoDisponivel() - $req->getValorConsumo();

            $this->clubeDao->atualizarSaldoDisponivel(
                $req->getClubeId(),
                $saldoAtual,
                $conn);
            
            $this->recursoDao->atualizarSaldoDisponivel(
                $req->getRecursoId(),
                $recurso->getSaldoDisponivel() - $req->getValorConsumo(),
                $conn);

            $conn->commit();

            return new ConsumirRecursoResponse($clube->getClube(), $saldoAnterior, $saldoAtual);

        } catch (\PDOException $e) {
            $conn->rollBack();
            throw new \Exception("Falha ao consumir recurso.");
        }
    }
}