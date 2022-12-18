<?php
require_once("class/banco.class.php");
$banco = new Banco();
echo "Entrando no sistema...";
if ($banco->limparRegistros() == "1")
{
    echo "<script>alert('Todos os registros foram limpos :)'); </script>";
    echo "<script> location.href='visualizarprodutos.php'; </script>";
}
else
{
    echo "<script>alert('Erro ao limpar os registros)'); </script>";
    echo "<script> location.href='visualizarprodutos.php'; </script>";
}
?>