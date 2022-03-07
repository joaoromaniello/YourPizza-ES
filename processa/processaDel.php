<?php
require_once '../classe/Funcionario.php';
$id=(int) $_GET['id'];
$func=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
if($func->deletar_funcionario($id)){

    print "<h1>Funcionario excluido com sucesso!</h1>";
}
else{
    print "<h1>falha ao excluir o funcionario</h1>";

}
?>