<?php
require_once("class/produto.class.php");

$objeto = new Produto();
if ($objeto->cadastrarDados($_GET) == "1")
{
    echo "<script>alert('O produto for registrado com sucesso!...'); </script>";
    echo "<script> location.href='cadastrarprodutopagina.php'; </script>";
}
else if($objeto->cadastrarDados($_GET) == "0")
{
    echo "<script> alert('ERRO ao registrar produto'); </script>";
    echo "<script> location.href='cadastrarprodutopagina.php'; </script>";
}
else 
{
    echo "<script> alert('Usuário não reconhecido!'); </script>";
    echo "<script> location.href='cadastrarusuariopagina.php'; </script>";
}
?>