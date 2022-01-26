<?php
require '../classe/Funcionario.php';
if(isset($_POST["btn_cadastrar_funcionario"]) && (!empty($_POST["senha"]))){
$nome=$_POST['nome'];
$sobrenome=$_POST["sobrenome"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$cep=$_POST["cep"];
$cidade=$_POST["cidade"];
$bairro=$_POST["bairro"];
$numero_casa=$_POST["numero_casa"];
$telefone=$_POST["telefone"];
$cargo =$_POST["cargo"];
$salario=$_POST["salario"];
print $nome . " ".$sobrenome . " ".$email . " ". $senha . " ". $cep . " ". $cidade . " ". $bairro . " ". $numero_casa . " ". $telefone. " ". $cargo . " ". $salario . " ";
$f=new Funcionario($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numero_casa,$telefone,$cargo,$salario);
$f->cadastrar();

}
?>