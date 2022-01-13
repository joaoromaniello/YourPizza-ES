<?php
require '../classe/Cliente.php';
if(isset($_POST["btn_cadastrar_cliente"]) && (!empty($_POST["senha"]))){
$nome=$_POST['nome'];
$sobrenome=$_POST["sobrenome"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$cep=$_POST["cep"];
$cidade=$_POST["cidade"];
$bairro=$_POST["bairro"];
$numero_casa=$_POST["numero_casa"];
$telefone=$_POST["telefone"];
$c=new Cliente($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numero_casa,$telefone);
$c->cadastrar();

}

?>