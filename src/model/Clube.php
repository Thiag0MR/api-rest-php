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
        // Fazer validações
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