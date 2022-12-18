<?php
require_once("class/banco.class.php");
require_once("class/usuario.class.php");
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$objeto = new Banco();
$usuario = new Usuario();

if ($objeto->loginSistema($email, $senha) == "1") {
    echo "<script>alert('USUARIO RECONHECIDO, BEM VINDO $nome'); </script>";
    echo "<script> location.href='index.php'; </script>";
} else if ($objeto->loginSistema($email, $senha) == "0") {
    echo "<script> alert('USUÁRIO/SENHA NÃO RECONHECIDOS'); </script>";
    echo "<script> location.href='login.html'; </script>";
}
