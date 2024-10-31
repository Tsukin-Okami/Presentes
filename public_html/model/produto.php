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
            $sql = "INSERT INTO produto VALUES (:codigo, :nome, :descricao, :foto, :buscar)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue("codigo", NULL);
            $stmt->bindValue("nome", $nome);
            $stmt->bindValue("descricao", $descricao);
            $stmt->bindValue("foto", "foto.jpg");
            $stmt->bindValue("buscar", NULL);                        

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

    public function removeProduto($nome) {
        try {
            $sql = "DELETE FROM produto WHERE nome=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $nome, PDO::PARAM_STR);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Produto excluido";
            } else {
                echo "Nenhum produto excluido";
            }

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}