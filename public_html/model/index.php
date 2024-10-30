<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include './connection.php';
        include './usuario.php';
        include './produto.php';
        include './lista.php';

        $u = new Usuario;
        //$u->addUsuario('a@a', 'a', 'a');
        //$u->validaUsuario('a@a', 'a');
        //$s = $u->recebeUsuario('a@a');
        //var_dump($s);

        $produto = new Produto;
        //$s = $produto->recebeProdutos();
        //var_dump($s);
        //$produto->addProduto("Banana", "Um fruto amarelo");

        $lista = new Lista;
        //$s = $lista->addLista("a@a", "descrição da lista");
        //var_dump($s);
        //$lista->removeLista("a@a");
        //$s = $lista->getLista("a@a");
        //var_dump($s);        
        //$s = $lista->addItem("a@a", 1);
        $lista->removeItem(3, 1);

        //var_dump(Connection::getConnection());
    ?>
</body>
</html>