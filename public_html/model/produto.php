<?php

class Produto
{
    public function recebeProdutos() {
        try {
            $sql = "SELECT * FROM produto";
            $stmt = Connection::getConnection()->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);

            return $result;
        } catch (Exception $th) {
            return false;
        }
    }

    public function addProduto($nome, $descricao) {
        try {
            $sql = "INSERT INTO produto VALUES (?, ?, ?, ?, ?)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, NULL); // CODIGO
            $stmt->bindValue(2, $nome);
            $stmt->bindValue(3, $descricao);
            $stmt->bindValue(4, "foto.jpg");
            $stmt->bindValue(5, NULL);                        

            $stmt->execute();
            echo "Produto adicionado";
            return true;
        } catch (Exception $e) {
            if ($e->getCode() == 1062) {
                echo "Produto já existe";
            } else {
                echo "Erro ao adicionar produto";
            }
            return false;
        }
    }
}