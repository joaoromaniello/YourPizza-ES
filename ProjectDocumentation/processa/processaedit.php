<?php
require_once '../classe/Funcionario.php';
$id=$_GET["id"];
$nome=$_POST['nome'];
$sobrenome=$_POST["sobrenome"];
$email=$_POST["email"];
$cep=$_POST["cep"];
$cidade=$_POST["cidade"];
$bairro=$_POST["bairro"];
$numero_casa=$_POST["numero_casa"];
$telefone=$_POST["telefone"];
$cargo =$_POST["cargo"];
$salario=$_POST["salario"];
$func=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);

$func->editar($nome,$sobrenome,$email,$cep,$cidade,$bairro,$numero_casa,$telefone,$cargo,$salario);