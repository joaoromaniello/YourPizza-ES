<?php
require_once '../classe/Complemento.php';
require_once '../classe/Pedido.php';

$preco=$_GET['preco'];
$cliente =$_GET['idCliente'];
$produto =$_GET['idproduto'];
$pedido=new Pedido($produto,$cliente,$preco);
if($pedido->cadastrar()){
    print "<h1>Novo pedido efetuado</h1>";

    $c=new Complemento(null,null);
    $lista=$c->buscar_por_id($produto);
    while ($lc =$lista->fetch(PDO::FETCH_ASSOC)){
        $c->decrementar_quantidade_conplementos($lc['idcomplemento']);
    }
}else{
    print "<h1>falha ao gerar novo pedidos</h1>";      
}