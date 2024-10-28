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

        $u = new Usuario;
        //$u->addUsuario('a@a', 'a', 'a');
        $u->validaUsuario('a@a', 'a');

        //var_dump(Connection::getConnection());
    ?>
</body>
</html>