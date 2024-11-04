<!DOCTYPE html>
<html>
    <head>
        <title>Pagina de Listas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="bootstrap/css/estilo.css"/>
    </head>
    <body>
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

            <div class="col-md-6">
                <form method="post">
                    <br>
                    <input type="text" name="search_nome" placeholder="Nome do Usuario" required>
                    <button type="submit">Buscar</button>
                </form>
            </div>
            
            <div class="row clearfix">
                <section class="col-md-6">
                    <hr>
                    <h2>
                        <strong>Lista de Presentes</strong>
                    </h2>
                    <hr>
                    <section class="col-md-6">
                        <h4>Perfil</h4>
                        <img src="..." alt="">
                        <p>Nome:</p>
                        <p>Email:</p>
                        <p><a href="">Link</a></p>
                        <p>Data de Criação:</p>
                    </section>
                </section>

                <section class="col-md-6">
                    <h4>
                        Itens da Lista
                    </h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3</td>
                                <td>Computer</td>
                                <td><a href="#">Ver</a></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        
    </body>
</html>
