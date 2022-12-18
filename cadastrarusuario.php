<?php
    require_once("class/usuario.class.php");
    
    $objeto = new Usuario();
    if($objeto->cadastrarUsuario($_GET) == "1")
    {
        echo "<script> alert('Dados gravados com sucesso!'); </script>";
        echo "<script> location.href='cadastrarusuariopagina.php'; </script>";
    }
    else if($objeto->cadastrarUsuario($_GET) == "0")
    {
        echo "<script> alert('ERRO ao cadastrar os dados!'); </script>";
        echo "<script> location.href='cadastrarusuariopagina.php'; </script>";
    }
?>