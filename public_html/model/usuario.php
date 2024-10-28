<?php

class Usuario 
{
    public function addUsuario($email, $nome, $senha) {
        try {
            $sql = "INSERT INTO usuario VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = Connection::getConnection()->prepare($sql);
            
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2,  md5($email));
            $stmt->bindValue(3, $nome);
            $stmt->bindValue(4, $senha);
            $stmt->bindValue(5, date('Y-m-d'));
            $stmt->bindValue(6, 'jpg');
            $stmt->execute();

            return "Usuario cadastrado com sucesso";
        } catch (Exception $ex) {
            if ($ex->getCode() == 1062) {
                return "Usuario já cadastrado";
            } else {
                return "Erro ao cadastrar usuário";
            }
        }
    }

    public function validaUsuario($email, $senha) {
        try {
            $sql = "SELECT * FROM usuario WHERE id=? AND senha=?";

            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();

            $result = $stmt->rowCount();

            //echo "Usuario Validado";

            return $result;

        } catch (Exception $ex) {
            echo "Usuario não validado";
            return false;
        }
    }
}