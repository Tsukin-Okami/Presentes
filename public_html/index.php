<!DOCTYPE html>

<html>
    <head>
        <title>Pagina Inicial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="bootstrap/css/estilo.css"/>
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
            $c->index();

            if ($c->cadastroIndex) echo $c->cadastroIndex;
            if ($c->loginIndex) echo $c->loginIndex;
        ?>
        </p>
        <div class="container">
            <header class="row clearfix">
                <div class="col-md-6">
                    <img src="..." alt="Logomarca">
                </div>
            </header>

            <nav class="row clearfix caixa">
                <ul>
                    <li>
                        <a href="index.php">Index</a>
                    </li>
                    <li>
                        <a href="home.php">Perfil</a>
                    </li>
                    <li>
                        <a href="listas.php">Listas</a>
                    </li>
                    <li>
                        <a href="produtos.php">Produtos</a>
                    </li>
                </ul>
            </nav>

            <div class="row clearfix">
                <!-- FORMULARIO LOGIN -->
                <section class="col-md-6">
                    <form method="post">
                        <hr>
                        <h2>
                            <strong>Efetue o login</strong>
                        </h2>
                        <hr>
                        <!-- ENTRADA DE DADOS -->
                        <p>
                            <input type="email" name="email" placeholder="Digite seu email" required>
                        </p>
                        <p>
                            <input type="password" name="senha" placeholder="Digite sua senha" required>
                            <label class="checkbox">
                                <input type="checkbox" name="lembrete"> Lembrar Senha
                            </label>
                        </p>
                        <!-- ENVIO DE DADOS -->
                        <p>
                            <button name="login" type="submit">Entrar</button>
                        </p>
                    </form>
                </section>

                <!-- FORMULARIO CADASTRO -->
                <section class="col-md-6">
                    <form method="post">
                        <hr>
                        <h2>
                            <strong>Cadastre-se agora</strong>
                        </h2>
                        <hr>
                        <!-- ENTRADA DE DADOS -->
                        <p>
                            <input type="email" name="email" placeholder="Digite seu email" required>
                        </p>
                        <p>
                            <input type="text" name="nome" placeholder="Digite seu nome" required>
                        </p>
                        <p>
                            <input type="password" name="senha" placeholder="Digite sua senha" required>
                        </p>
                        <!-- ENVIO DE DADOS -->
                        <p>
                            <button name="cadastrar" type="submit">Cadastrar</button>
                        </p>
                    </form>
                </section>
            </div>
            
            <section class="row clearfix">
                <hr>
                <h2>
                    <strong>
                        Como criar sua própria lista
                    </strong>
                </h2>
                <hr>
                <div>
                    <div>
                        <img src="..." alt="tutorial_1"/>
                    </div>
                    <div>
                        <p>
                            Texto Explicativo
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
