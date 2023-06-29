<?php

namespace app\model;

class Clube {
    private string $clube;
    private float $saldo_disponivel;

    public function __construct($clube, $saldo_disponivel) {
        $this->clube = $clube;
        $this->saldo_disponivel = is_string($saldo_disponivel) ? floatval($saldo_disponivel) : $saldo_disponivel;
    }

    public function getClube(): string {
        return $this->clube;
    }
    public function getSaldoDisponivel(): float {
        return $this->saldo_disponivel;
    }

    public function isValid() : bool {
        $errorMessage = array();
        if ($this->saldo_disponivel < 0) {
            array_push($errorMessage, 'Saldo não deve ser negativo.');
        }
        if (strlen($this->clube) < 3)  {
            array_push($errorMessage, 'O nome do clube deve ter mais de 3 caracteres.');
        }

        if (sizeof($errorMessage) > 0) {
            throw new \Exception(json_encode($errorMessage, JSON_UNESCAPED_UNICODE));
        }
        return true;
    }
    
    public static function deserialize($data) : Clube {
        if (array_key_exists('clube', $data) && 
            array_key_exists('saldo_disponivel', $data)) {
                
            return new Clube($data['clube'], $data['saldo_disponivel']);
        }
        throw new \Exception("Falha ao deserializar objeto.");
    }
}