<?php

class Lista
{
    public function addLista($email, $descricao) {
        try {
            $sql = "INSERT INTO lista VALUES (?, ?, ?)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, NULL); // ID
            $stmt->bindValue(2, $descricao);
            $stmt->bindValue(3, $email);

            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function removeLista($email) {
        try {
            $sql = "DELETE FROM lista WHERE usuario=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Lista excluida";
            } else {
                echo "Nenhuma lista excluida";
            }

            return true;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function getLista($email) {
        try {
            $sql = "SELECT * FROM lista WHERE usuario=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_BOTH);
                return $result;
            }

            echo "sem lista";
            return false;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function addItem($email, $produto) {
        try {
            $lista = $this->getLista($email);
            if (!$lista) {
                return "Lista não encontrada";
            }

            $sql = "INSERT INTO item VALUES (?, ?, ?)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, NULL); // ID
            $stmt->bindValue(2, $lista['codigo']);
            $stmt->bindValue(3, $produto);

            $stmt->execute();
            echo "Produto adicionado com sucesso";
            return true;
        } catch (Exception $e) {
            if ($e->getCode() == 1062) {
                echo "Produto já adicionado a lista";
            } else {
                echo "Produto não adicionado a lista";
            }
            return false;
        }
    }

    public function removeItem($lista, $produto) {
        try {
            $sql = "DELETE FROM item WHERE lista_codigo=? AND produto_codigo=?";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $lista);
            $stmt->bindValue(2, $produto);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Item removido";
            } else {
                echo "Nenhum item removido";
            }

            return true;
        } catch (Exception $e) {
            echo "Erro ao remover item";
            return false;
        }
    }
}