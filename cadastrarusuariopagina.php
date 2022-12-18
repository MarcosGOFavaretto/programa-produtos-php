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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/estilo.css">

    <!--Link Para Fontes (Ícones)-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Favicon-->
    <link rel="shortcut icon" href="IMAGENS/cadastrarusuario.png">

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

    <!----------FORMULÁRIO---------->
    <section id="contato" class="py-3">
        <div class="container text-center my-3">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container">
                        <h1 class="my-4">Informe os dados do usuário nos campos abaixo:</h1>
                        <form class="needs-validation" novalidate action="cadastrarusuario.php" method="GET">
                            <!---->
                            <div class="form-row">
                                <div class="col-lg-12 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="nomeIcon"><i class="fas fa-user-circle"></i></span> </div>
                                        <input name="txtNome" type="text" id="nome" placeholder="Nome Completo do Usuário (sem acentos ou caracteres especiais)" pattern="[A-Za-z ']{2,}" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Deverá
                                                possuir no mínimo 2 caracteres</small> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="nomeIcon"><i class="fas fa-at"></i></span> </div>
                                        <input name="txtEmail" type="email" id="email" placeholder="Email para cadastro" pattern="{3,}" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Deverá
                                                possuir no mínimo 3 caracteres</small> </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="nomeIcon"><i class="fas fa-key"></i></i></span> </div>
                                        <input name="txtSenha" type="password" id="senha" placeholder="Senha para cadastro(no máximo 30 caracteres)" pattern="{,30}" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Deverá
                                                possuir no máximo 30 caracteres</small> </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="form-row">
                                <div class="col-lg-4 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="produtoIcon"><i class="fas fa-mobile"></i></span> </div>
                                        <input name="txtTelefone" type="text" id="telefone" placeholder="(__) _____-____" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="18" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Siga este modelo: (11) 11111-1111</small> </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="fornecedorIcon"><i class="far fa-id-card"></i></span>
                                        </div>
                                        <input name="txtRG" type="text" id="rg" placeholder="RG: __.___.___-_" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}" maxlength="12" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Digite o RG no seguinto modelo: 11.111.111-1</small> </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 my-2 pt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="fornecedorIcon"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input name="txtCPF" type="text" id="cpf" placeholder="CPF: ___.___.___-__" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" required class="form-control">
                                        <div class="invalid-tooltip pt-0"> <small class="animated fadeInDown">Digite o CPF no seguinto modelo: 111.111.111-11</small> </div>
                                    </div>
                                </div>
                                <h4 class="color-red">POR FAVOR, NÃO INSIRA SEUS DADOS VERDADEIROS, NÃO É SEGURO!</h4>
                            </div>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <div class="row my-4">
                                            <div class="col-lg-6">
                                                <button name="Enviar" type="submit" class="btn btn-lg btn btn-outline-dark my-2 my-sm-0">Enviar&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-paper-plane"></i>&nbsp;</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <button name="Cancelar" type="reset" class="btn btn-lg btn btn-outline-dark my-2 my-sm-0">Cancelar&nbsp;<i class="fas fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <script type="text/Javascript">
            // Código para máscaras nos campos:
            jQuery.noConflict();
            jQuery(function($)
            {
                $("#telefone").mask("(099) 9 9999-9999");
                $("#rg").mask("99.999.999-9");
                $("#cpf").mask("999.999.999-99");
            });
        </script>
        <script>
            // Código para a validação 
            (function() {
                'use strict';
                window.addEventListener('load', function() {

                    var forms = document.getElementsByClassName('needs-validation');

                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </section>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>