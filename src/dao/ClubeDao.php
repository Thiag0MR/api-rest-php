<?php

namespace app\dao;

use app\model\Clube;

class ClubeDao {
    private static string $nome_tabela = "clube";

    public function selecionar($clube_id) : Clube{
        
        $conn = Database::getConnection();

        $sql = 'SELECT * FROM '.self::$nome_tabela.' WHERE id = '.$clube_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC); 
            return new Clube($result['clube'], $result['saldo_disponivel']); 
        } else {
            throw new \Exception("Não existe nenhum clube com esse id!");
        }
    }

    public function selecionarTodosClubes() {
        $conn = Database::getConnection();

        $sql = 'SELECT * FROM '.self::$nome_tabela;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Não existe nenhum clube cadastrado!");
        }
    }
    
    public function inserir($clube) {
        $conn = Database::getConnection();

        try {
            $sql = 'INSERT INTO '.self::$nome_tabela.' (clube, saldo_disponivel) VALUES (:cl, :sd)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':cl', $clube->getClube());
            $stmt->bindValue(':sd', $clube->getSaldoDisponivel());
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return 'Clube inserido com sucesso!';
            } 
        } catch (\Exception $e) {
            if ($stmt->errorInfo()[0] === "23000") {
                throw new \Exception("Esse clube já se encontra cadastrado no banco.");
            }
            throw new \Exception("Falha ao inserir clube!");
        }
    }
    
    public function atualizarSaldoDisponivel($id, $saldo, $conn = null) {
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
            throw new \Exception("Falha ao atualizar saldo do clube!");
        }
    }
}