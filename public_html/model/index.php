<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Php</title>
</head>
<body>
    <h1>Php Model Test</h1><hr>
    <?php
        include './connection.php';
        include './usuario.php';
        include './produto.php';
        include './lista.php';

        //var_dump(Connection::getConnection());

        $u = new Usuario;
        //$u->addUsuario('a@a', 'a', 'a');
        //$u->validaUsuario('a@a', 'a');
        //$s = $u->recebeUsuario('a@a');
        //var_dump($s);

        $produto = new Produto;
        //$s = $produto->recebeProdutos();
        //$produto->addProduto("Banana", "Um fruto amarelo");
        //var_dump($s);

        $lista = new Lista;
        //$s = $lista->addLista("a@a", "descrição da lista");
        //$s = $lista->getLista("a@a");
        //$lista->removeLista("a@a");
        //$s = $lista->addItem("a@a", 1);
        //$lista->removeItem(3, 1);
        //var_dump($s);
    ?>
</body>
</html>