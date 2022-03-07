<?php
require_once '../classe/Pedido.php';
if(isset($_POST['mudar_status'])){
    $id=$_GET['id'];
    $status=$_POST["changeStatus"];
    $p=new Pedido(null,null,null);
    if($res=$p->mudar_status($id,$status)){
        print "<h1> Situação do pedido alterada com sucesso</h1>";
    }else{
        print "<h1> falha ao alterar a Situação do pedido</h1>";

    }
    
}


?>