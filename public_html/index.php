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
        include './model/connection.php';
        include './model/usuario.php';
        include './model/produto.php';
        include './model/lista.php';

        //var_dump(Connection::getConnection());

        $u = new Usuario;
        //$s = $u->addUsuario('a@a', 'a', 'a');
        //$s = $u->validaUsuario('a@a', 'a');
        //$s = $u->recebeUsuario('a@a');

        $produto = new Produto;
        //$s = $produto->recebeProdutos();
        //$s = $produto->addProduto("Banana", "Um fruto amarelo");
        //$s = $produto->removeProduto("Banana");

        $lista = new Lista;
        //$s = $lista->addLista("a@a", "descrição da lista");
        //$s = $lista->getLista("a@a");
        //$s = $lista->removeLista("a@a");
        //$s = $lista->addItem("a@a", 2);
        //$s = $lista->removeItem(3, 1);
        //$s = $lista->getItems(3);
        $s = $lista->getItemsUsuario("a@a");

        echo "<hr>";
        var_dump($s);
    ?>
</body>
</html>