<?php

class Usuario 
{
    public function addUsuario($email, $nome, $senha) {
        try {
            $sql = "INSERT INTO usuario VALUES (?, ?, ?, ?, ?)";
            $stmt = Connection::getConnection()->prepare($sql);
            
            $stmt->bindValue(1, $email);
            //$stmt->bindValue(1,  md5($email)); // email criptografado
            $stmt->bindValue(2, $nome);
            $stmt->bindValue(3, $senha);
            $stmt->bindValue(4, date('Y-m-d'));
            $stmt->bindValue(5, 'jpg');
            $stmt->execute();

            echo "Usuario cadastrado com sucesso" . "<br>";
            return true;
        } catch (PDOException $ex) {
            if ($ex->getCode() == 1062) {
                echo "Usuario já cadastrado" . "<br>";
            } else {
                echo "Erro ao cadastrar usuário" . "<br>";
                echo $ex->getMessage();
            }
            return false;
        }
    }

    public function validaUsuario($email, $senha) {
        try {
            $sql = "SELECT * FROM usuario WHERE email=? AND senha=?";

            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();

            $result = $stmt->rowCount();

            if ($stmt->rowCount() > 0) {
                echo "Usuario Validado" . "<br>";
            } else {
                echo "Usuario não existe" . "<br>";
            }
            return $result;
            
        } catch (PDOException $ex) {
            echo "Usuario não validado" . "<br>";
            echo $ex->getMessage();
            return false;
        }
    }

    public function recebeUsuario($email) {
        try {
            $sql = "SELECT * FROM usuario WHERE email=?";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(1,$email);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                //echo "recebido";
                $result = $stmt->fetch(PDO::FETCH_BOTH);
                return $result;
            }

            echo "Sem dados" . "<br>";
            return false;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function recebeUsuarios() {
        try {
            $sql = "SELECT * FROM usuario";

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                //echo "recebido";

                $result = $stmt->fetch(PDO::FETCH_BOTH);

                return $result;
            }

            echo "Sem usuarios" . "<br>";
            return false;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }
}