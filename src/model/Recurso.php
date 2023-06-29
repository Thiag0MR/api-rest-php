<?php

namespace app\model;

class Recurso {
    private string $recurso;
    private float $saldo_disponivel;

    public function __construct($recurso, $saldo_disponivel) {
        $this->recurso = $recurso;
        $this->saldo_disponivel = is_string($saldo_disponivel) ? floatval($saldo_disponivel) : $saldo_disponivel;
    }

    public function getRecurso(): string {
        return $this->recurso;
    }
    public function getSaldoDisponivel(): float {
        return $this->saldo_disponivel;
    }
}