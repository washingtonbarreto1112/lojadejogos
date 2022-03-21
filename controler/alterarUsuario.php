<?php
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");
include_once("../view/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(alterarUsuario($conn,$codigousu,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compleusu)){
echo("Dados alterados com Sucesso!!");
}else{
echo("Dados não alterados.");
}

include_once("../view/footer.php");

?>