<?php
require_once("class/banco.class.php");
require_once("class/usuario.class.php");
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("location:login.html");
} else {
    $banco = new Banco();
    $usuario = new Usuario();
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $nome_usuario = $usuario->getNome($email, $senha);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/estilo.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="IMAGENS/favicon.png">

    <title>Programa - Cadastra Produtos</title>
</head>

<body>
    <!----------NAVBAR---------->
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="IMAGENS/iconebranco.png" width="30px" height="30px">Cadastro de
                Produtos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link margin-left-10px border-left-6px" href="cadastrarprodutopagina.php">Novo
                            Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-left-10px border-left-6px" href="cadastrarusuariopagina.php">Novo
                            Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link margin-left-10px border-left-6px" href="visualizarprodutos.php">Todos
                            Produtos</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0" action="sair.php">
                <div id="usuario">
                    <?php
                        echo "$nome_usuario";
                    ?>
                </div>
                <button class="btn my-2 my-sm-0" type="submit"><img src="IMAGENS/sair.png" alt="Sair"></button>
            </form>
        </nav>
    </section>

    <!----------DESCRIÇÃO----------->
    <section>
        <div class="background-image py-5">
            <div class="background-color-lightblue">
                <div class="container text-center">
                    <h3 class="py-2">PROGRAMA PARA O CADASTRO DE PRODUTOS</h3>
                    <hr color="#000000" width="59%" noshade size="10px">
                    <p class="py-2">Este programa possui a função de cadastrar produtos de uma loja fictícia em
                        um banco de dados online. Através deste, o usuário poderá gravar, editar, excluir e
                        visualizar
                        os dados.
                    </p>
                </div>
            </div>

            <!----------CARDS---------->
            <div class="container-fluid">
                <div class="row">

                    <div class="col-3"></div>

                    <div class="card col-sm-2 col-xs-2">
                        <img class="card-img-top" src="IMAGENS/cadastrar.png" alt="Imagem de capa do card">
                        <div class="card">
                            <a href="cadastrarproduto.html" class="btn btn-primary">CADASTRAR PRODUTO</a>
                        </div>
                    </div>

                    <div class="col-2"></div>

                    <div class="card col-sm-2 col-xs-2">
                        <img class="card-img-top" src="IMAGENS/cadastrarusuario.png" alt="Imagem de capa do card">
                        <div class="card">
                            <a href="cadastrarusuario.html" class="btn btn-primary">CADASTRAR USUÁRIO</a>
                        </div>
                    </div>

                    <div class="col-3"></div>
                </div>

                <div class="row">
                    <div class="col-12 py-5"></div>
                </div>

                <div class="row">

                    <div class="col-3"></div>

                    <div class="card col-sm-2 col-xs-2">
                        <img class="card-img-top" src="IMAGENS/visualizar.png" alt="Imagem de capa do card">
                        <div class="card">
                            <a href="visualizarprodutos.php" class="btn btn-primary">VISUALIZAR PRODUTO</a>
                        </div>
                    </div>

                    <div class="col-2"></div>

                    <div class="card col-sm-2 col-xs-2">
                        <img class="card-img-top" src="IMAGENS/apagar.png" alt="Imagem de capa do card">
                        <div class="card">
                            <a href="limparregistros.php" class="btn btn-primary">LIMPAR REGISTROS</a>
                        </div>
                    </div>

                    <div class="col-3"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>