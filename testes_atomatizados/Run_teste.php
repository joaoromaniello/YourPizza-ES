<?php
require_once '../testes_atomatizados/TesteCliente.php';
require_once '../testes_atomatizados/TesteComplemento.php';
require_once '../testes_atomatizados/TesteLogin.php';
require_once '../testes_atomatizados/TesteFuncionario.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execução de testes em php</title>
</head>
<body>
    <h1>Bem vindo a pagina de testes do Your pizza</h1>
    <h2>Teste de Login</h2>
    <hr>
    <p>teste Login Funcionario</p>
    <?php $testLogin=new TesteLogin(); 
    print_r( var_dump($testLogin->TesteLoginFuncionario('gabrial@gmmail.com','123')));
    ?>   
    <hr>
    <p>teste Login gerente</p>
    <?php $testLogin=new TesteLogin(); 
    print_r( var_dump($testLogin->testeLoginGerente('joaobspaula@hotmail.com','123')));
    ?>   
    <hr>
    <hr>
    <p>teste Login Cliente</p>
    <?php $testLogin=new TesteLogin(); 
    print_r( var_dump($testLogin->testeLoginCliente('testejb@gmail.com','123')));
    ?>
    <hr>
    <h2>Testes Referentes ao Cliente</h2>
    <hr>
    <p>Busca Cliente Por Id</p>
    <?php $testCliente=new TesteCliente();
            print_r( var_dump($testCliente->testeBuscaEspecifica(8)));

    ?>
    <p>Edita Cliente</p>
    
    <?php $testCliente=new TesteCliente();
            print_r( var_dump($testCliente->testeEditaCliente("joao","cliente","testejb@gmail.com","000.000.000","florianopolis","bairro",0,"0 0000-0000")));

    ?>
    <hr>
</body>
</html>