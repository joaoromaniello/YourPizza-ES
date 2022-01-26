<?php
require_once '../classe/Funcionario.php';
$id=(int) $_GET['id'];
$func=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
$func->deletar_funcionario($id);

?>