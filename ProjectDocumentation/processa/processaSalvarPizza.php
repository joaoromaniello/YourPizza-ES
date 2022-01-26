<?php
require_once '../classe/Logar.php';
require_once '../classe/Pizza.php';
if(! isset($_SESSION)){
    session_start();
}
if(! isset($_SESSION["logado_cliente"])){
    echo '<a href="../telas/login.php">voltar a tela de login</a>';
    die("esta area é retrita");
}
if(isset($_GET['id']) && (isset($_GET['idcliente']))){
    $pizza=new Pizza(null,null,null,null);
    $resultado=$pizza->salvar_pizza($_GET['id'],$_GET['idcliente']);
    if($resultado){
        echo '<h1> pizza salva com sucesso </h1>';
    }
}
?>