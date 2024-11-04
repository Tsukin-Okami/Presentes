<!DOCTYPE html>
<html>
    <head>
        <title>Pagina de Perfil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="bootstrap/css/estilo.css"/>
        <style>
            table, td, th {
                border: 1px solid black;
                width: 500px;
            }
        </style>
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

            <div class="row clearfix">
                <section class="col-md-6">
                    <hr>
                    <h2>
                        <strong>
                            Meu perfil
                        </strong>
                    </h2>
                    <hr>
                    <h3>
                        <img src="..." alt="Imagem de Perfil"/>
                    </h3>
                    <hr>
                    <form method="post" enctype="multipart/form-data">
                        <p>
                            <input type="file" name="arquivo">
                        </p>
                        <p>
                            <button name="enviarFoto" type="submit">Enviar</button>
                        </p>
                    </form>
                </section>

                <section class="col-md-6">
                    <h4>
                        Dados de Perfil
                    </h4>
                    <p>
                        Nome: Usuario
                    </p>
                    <p>
                        Email: usuario@usuario.com
                    </p>
                    <p>
                        <a href="#">Meu link</a>
                    </p>
                    <p>
                        Data de Criação 12/12/2012
                    </p>
                    <br>
                    <div>
                        <h3>Minha Lista</h3>
                        <p>Nome: Lista de Aniversário</p>
                        <form method="post">
                            <input type="text" name="descricao" placeholder="Coloque aqui o nome de sua lista" required>
                            <button name="criarLista" type="submit">Criar lista</button>
                        </form>
                    </div>
                </section>

                <div class="row clearfix">
                    <section class="col-md-6">
                        <h3>Itens da Minha lista</h3>
                        <table>
                            <!-- CABEÇALHO -->
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <!-- CORPO -->
                            <tbody>
                                <td>6</td>
                                <td>Computador</td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="cpdProduto" value="6">
                                        <button name="excluirItem" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tbody>
                        </table>
                    </section>
                    
                    <section class="col-md-6">
                        <h3>Indicar para um amigo</h3>
                        <form method="post">
                            <input type="hidden" name="link" value="">
                            <p>
                                <input type="text" name="nome" placeholder="Nome" required>
                            </p>
                            <p>
                                <input type="email" name="email" placeholder="Email" required>
                            </p>
                            <p>
                                <button type="submit">Indicar</button>
                            </p>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        
    </body>
</html>
