<?php
require_once '../classe/Cliente.php';
if(!isset($_POST["btn_editar_cliente"])){
    die("<a href='../telas/AdiminCliente.php'>Voltar para tela inicial do cliente</a>");
    exit();
}
if(isset($_POST["btn_editar_cliente"])){
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

if($c->editar($nome,$sobrenome,$email,$cep,$cidade,$bairro,$numero_casa,$telefone,$id)){
echo "<h1>atualização efutuada com sucesso !</h1>";
    echo "<a href='../telas/AdiminCliente.php'>Voltar para tela inicial do cliente</a>";

}else{
    echo "<h1>nao foi possivel atualizar os dados</h1>";
    echo "<a href='../telas/AdiminCliente.php'>Voltar para tela inicial do cliente</a>";

}



}


?>
