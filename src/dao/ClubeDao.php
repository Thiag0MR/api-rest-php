<?php

namespace app\dao;

use app\model\Clube;

class ClubeDao {
    private static string $nome_tabela = "clube";

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
}