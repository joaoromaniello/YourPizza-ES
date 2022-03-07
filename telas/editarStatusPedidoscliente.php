<?php
require_once '../classe/Pedido.php';
require_once '../classe/Logar.php';

if(isset($_POST['mudar_status'])){
    $id=$_GET['id'];
    $status=$_POST["changeStatus"];
    $p=new Pedido(null,null,null);
    if($res=$p->mudar_status_cliente($id,$status,$_SESSION["Id_cliente"])){
        print "<h1>Pedido cancelado com sucesso !</h1>";
    }else{
        print "<h1>opps.. ocorreu uma falha ao cancelar este pedido,sentimos muito. tente novamente </h1>";

    }
}


?>
