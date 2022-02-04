<?php
require_once '../classe/Pedido.php';
if(isset($_POST['mudar_status'])){
    $id=$_GET['id'];
    $status=$_POST["changeStatus"];
    $p=new Pedido(null,null,null);
    $res=$p->mudar_status($id,$status);
    
}


?>