<?php
require_once '../classe/Complemento.php';
if(isset($_POST["btn_cadastrar_complemento"])){
    $nome=$_POST["complemento_nome"];
    $qtdcomplemento=$_POST["qtdcomplemento"];

   $complemento=new Complemento($nome,$qtdcomplemento);
   $complemento->cadastrar();
}