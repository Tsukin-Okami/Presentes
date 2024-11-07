<?php

class Controller
{
    public bool|string $cadastroIndex = false;
    public bool|string $loginIndex = false;
    public $listaProduto = false;
    public bool|string $mensagemProduto = false;

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if (isset($_POST['cadastrar'])) {
                $email = $_POST['email'];
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];

                $usuario = new Usuario;
                $this->cadastroIndex = $usuario->addUsuario($email, $nome, $senha);
            }

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $login = new Usuario;
                if ($login->validaUsuario($email, $senha) > (0 || false)) {
                    header('Location:home.php');
                    exit;
                } else {
                    $this->loginIndex = "Dados Inválidos";
                }
            }
        }
    }

    public function produtos() {
        $p = new Produto;
        $this->listaProduto = $p->recebeProdutos();

        if (isset($_POST['add'])) {
            $codigo = $_POST['codigo'];

            $lista = new Lista;

            $this->mensagemProduto = $lista->addItem('test@email', $codigo);
        }
    }
}