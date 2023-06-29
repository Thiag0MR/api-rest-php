<?php

namespace app\dao;

use app\model\Recurso;

class RecursoDao {

    private static string $nome_tabela = "recurso";

    public function selecionar($recurso_id) : Recurso {
        
        $conn = Database::getConnection();

        $sql = 'SELECT * FROM '.self::$nome_tabela.' WHERE id = '.$recurso_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return new Recurso($result['recurso'], $result['saldo_disponivel']);
        } else {
            throw new \Exception("Não existe nenhum recurso com esse id!");
        }
    }

    public function atualizarSaldoDisponivel($id, $saldo, $conn = null){
        $conn = is_null($conn) ? Database::getConnection(): $conn;
        
        $sql = 'UPDATE '.self::$nome_tabela.' 
            SET saldo_disponivel = :sd
            WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':sd', $saldo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            throw new \Exception("Falha ao atualizar saldo do recurso!");
        }
    }
}