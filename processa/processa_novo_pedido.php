<?php
require_once '../classe/Complemento.php';
require_once '../classe/Pedido.php';

$preco=$_GET['preco'];
$cliente =$_GET['idCliente'];
$produto =$_GET['idproduto'];
$pedido=new Pedido($produto,$cliente,$preco);
if($pedido->cadastrar()){
    $c=new Complemento(null,null);
    $lista=$c->buscar_por_id($produto);
    while ($lc =$lista->fetch(PDO::FETCH_ASSOC)){
        $c->decrementar_quantidade_conplementos($lc['idcomplemento']);
    }
}