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
<?php
require_once("class/banco.class.php");
?>
<!--Favicon-->
<link rel="shortcut icon" href="IMAGENS/visualizar.png">
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
    <section>
        <!--INÍCIO DO SCRIPT PHP-->
        <?php
        // Criando instância com a classe "banco.class.php" no objeto "$conexao":
        $banco = new Banco();
        $banco->visualizarProdutos();
        ?>
        <!--FIM DO SCRIPT PHP-->
    </section>
    <section>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8 col-xs-8">
                <form action="limparregistros.php">
                    <button type="submit" class="mt-5">Excluir todos os registros</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </section>
</body>

</html>