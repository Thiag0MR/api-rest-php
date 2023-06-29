<?php

namespace app\model;

class ConsumirRecursoResponse {
    public string $clube;
    public float $saldo_anterior;
    public float $saldo_atual;

    public function __construct($clube, $saldo_anterior, $saldo_atual) {
        $this->clube = $clube;
        $this->saldo_anterior = $saldo_anterior;
        $this->saldo_atual = $saldo_atual;
    }
}