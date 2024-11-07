<!DOCTYPE html>
<html>
    <head>
        <title>Pagina de Produtos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/estilo.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        <style>
            .console {
                background: blue; 
                color: white; 
                padding: 8px; 
                font-family: 'consolas';
            }
        </style>
    </head>
    <body>
        <p class="console">
        <?php 
            include './model/connection.php';
            include './model/usuario.php';
            include './model/produto.php';
            include './model/lista.php';
            include './controller/controller.php';
            
            $c = new Controller;
            $c->produtos();

            if ($c->mensagemProduto) echo $c->mensagemProduto . "<br>";
            //if ($c->listaProduto) echo ($c->listaProduto);
        ?>
        </p>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Logomarca</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Index</a>
                    </li>
                    <li>
                        <a href="home.php">Perfil</a>
                    </li>
                    <li>
                        <a href="listas.php">Listas</a>
                    </li>
                    <li class="active">
                        <a href="produtos.php">Produtos</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div>
                <hr>
                <h2>
                    <strong>Produtos para sua lista</strong>
                </h2>
                <hr>
            </div>
            
            <section class="row clearfix caixa centralizada">
                <article class="col-md-6">
                    <img src="./bootstrap/img/produtos/pc.jpg" alt="foto" class="img responsive center-1" width="350" height="350">
                    <h2>
                        Titulo do Produto
                    </h2>
                    <p>
                        Descrição do Produto
                    </p>
                    <p>
                        <a href="#">Link do Produto</a>
                    </p>
    
                    <form method="post">
                        <input type="hidden" name="codigo" value="|">
                        <button class="btn btn-primary btn-lg" name="add">Adicionar a lista</button>
                    </form>
                </article>
            </section>
        </div>
        
    </body>
</html>
