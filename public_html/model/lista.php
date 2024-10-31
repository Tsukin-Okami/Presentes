<?php

class Lista
{
    public function addLista($email, $descricao) {
        try {
            $sql = "INSERT INTO lista VALUES (:codigo, :descricao, :email)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue("codigo", NULL); // ID
            $stmt->bindValue("descricao", $descricao);
            $stmt->bindValue("email", $email);

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

            $sql = "INSERT INTO item VALUES (:codigo, :lista_codigo, :produto_codigo)";
            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue("codigo", NULL); // ID
            $stmt->bindValue("lista_codigo", $lista['codigo']);
            $stmt->bindValue("produto_codigo", $produto);

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

    public function getItems($lista) {
        try {
            $sql = "SELECT item.id AS \"item_id\", item.produto_codigo, produto.nome AS \"produto_nome\" FROM item 
            INNER JOIN produto ON item.produto_codigo=produto.codigo WHERE item.lista_codigo=?;";

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $lista);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                return $result;
            }

            echo "Sem itens";
            return false;
        } catch (PDOException $e) {
            echo "Erro ao tentar receber itens<br>\n";
            echo $e->getMessage();
            return false;
        }
    }

    public function getItemsUsuario($email) {
        try {
            $sql = "SELECT item.id AS \"item_id\", lista.codigo AS \"lista_codigo\", item.produto_codigo, produto.nome AS \"produto_nome\" FROM 
            (((item INNER JOIN produto ON item.produto_codigo=produto.codigo) INNER JOIN lista ON item.lista_codigo=lista.codigo) 
            INNER JOIN usuario ON lista.usuario=usuario.email) WHERE usuario.email=?;";

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(1, $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                return $result;
            }

            echo "Sem items e usuarios";
            return false;

        } catch (Exception $e) {
            echo "Erro ao tentar receber itens e usuarios<br>\n";
            echo $e->getMessage();
            return false;
        }
    }
}