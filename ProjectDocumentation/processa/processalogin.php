<?php
require_once "../classe/Logar.php";
require_once '../classe/Cliente.php';
require_once '../classe/Funcionario.php';
require_once '../classe/Gerente.php';


if( isset($_POST["email_login"]) && isset($_POST["senha_login"]) &&!empty($_POST["senha_login"]) && !empty($_POST["email_login"])){
    $login=new Logar();
    if($login->login_cliente($_POST["email_login"],$_POST["senha_login"])){
        header('location: ../telas/AdiminCliente.php?id='. $_SESSION['Id_cliente']);
    }else if($login->login_funcionario($_POST["email_login"],$_POST["senha_login"])){
        header('location: ../telas/AdminFuncionario.php?id='. $_SESSION['id_funcionario']);


    }else if($login->login_gerente($_POST["email_login"],$_POST["senha_login"])){
        header('location: ../telas/AdminGerente.php?id='. $_SESSION['id_gerente']);

    }
    else{
        print "<h1>Você não tem acesso ao sistema interno</h1>";
    }

}   
 
?>