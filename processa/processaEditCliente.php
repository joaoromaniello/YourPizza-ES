<?php
require_once '../classe/Cliente.php';
$id=$_GET["id"];
$nome=$_POST['nome'];
$sobrenome=$_POST["sobrenome"];
$email=$_POST["email"];
$cep=$_POST["cep"];
$cidade=$_POST["cidade"];
$bairro=$_POST["bairro"];
$numero_casa=$_POST["numero_casa"];
$telefone=$_POST["telefone"];

$c=new Cliente(null,null,null,null,null,null,null,null,null,null,null);

$c->editar($nome,$sobrenome,$email,$cep,$cidade,$bairro,$numero_casa,$telefone);