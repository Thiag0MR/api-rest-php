<?php

namespace app\model;

class ConsumirRecursoRequest {
    private int $clube_id;
    private int $recurso_id;
    private float $valor_consumo;

    public function __construct($clube_id, $recurso_id, $valor_consumo) {
        $this->clube_id = $clube_id;
        $this->recurso_id = $recurso_id;
        $this->valor_consumo = is_string($valor_consumo) ? floatval($valor_consumo) : $valor_consumo;
    }

    public function getClubeId() {
        return $this->clube_id;
    }
    public function getRecursoId() {
        return $this->recurso_id;
    }
    public function getValorConsumo() {
        return $this->valor_consumo;
    }
    
    public static function deserialize($data) : ConsumirRecursoRequest {
        if (array_key_exists('clube_id', $data) && 
            array_key_exists('recurso_id', $data) &&
            array_key_exists('valor_consumo', $data)) {

            return new ConsumirRecursoRequest(
                $data['clube_id'], 
                $data['recurso_id'], 
                $data['valor_consumo']);
        }
        throw new \Exception("Falha ao deserializar objeto.");
    }
}