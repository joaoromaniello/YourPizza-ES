<?php
require_once '../classe/Logar.php';
require_once '../classe\Pizza.php';
require_once '../classe/PizzaComplemento.php';
require_once '../classe/Pedido.php';
require_once '../classe/Complemento.php';
if(! isset($_SESSION)){
    session_start();
}
if(!isset($_POST["btnPedido"]) || !isset($_SESSION["logado_cliente"])){
    die("<a href='../telas/AdiminCliente.php'>Voltar para tela inicial do cliente</a>");
    exit();
}

if(isset($_POST["btnPedido"])&& isset($_SESSION["logado_cliente"])){
    $nome=$_POST["nome"];
    $complementos=$_POST["complementos"];
    $tamanho=$_POST["tamanho"];
        $id_cliente=$_SESSION["Id_cliente"];
        $descricao=$_POST["descricao"];
        $borda=$_POST["borda"];
        $valor_pagar=$_POST["valor_pagar"];
 
        $pizza=new Pizza($nome,$descricao,$borda,$tamanho);
        $codPizza=$pizza->cadastrar();
        $novoPedido=new Pedido($codPizza,$id_cliente,$valor_pagar);
        $comp=new Complemento(null,null);

    foreach ($complementos as $c){
        $pizzaComplemnto=new PizzaComplemento($codPizza,$c);
        $pizzaComplemnto->cadastrar();
        $comp->decrementar_quantidade_conplementos($c);


    }
    if( $novoPedido->cadastrar()){
         print "<h1>Seu pedido foi realizado por favor, aguarde o recebimento muito obrigado pela preferencia</h1>";
   }
    echo"<a href='../telas/AdiminCliente.php'>Voltar para tela inicial do cliente</a>";


}

?>
