<?php
require_once '../classe/Complemento.php';
if(isset($_POST["btn_cadastrar_complemento"])){
    $nome=$_POST["complemento_nome"];
    $qtdcomplemento=$_POST["qtdcomplemento"];

   $complemento=new Complemento($nome,$qtdcomplemento);
if (   $complemento->cadastrar()) {
        print "<h1> novo complemento cadastrado com sucesso</h1>";
}else{
    print "<h1>nao foi possivel cadastrar este novo complemento</h1>";
}
}