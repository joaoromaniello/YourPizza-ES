<?php
require_once '../classe/Cliente.php';
class TesteCliente{
 public function testeCadastraCliente($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numerocasa,$telefone){
    $c=new Cliente($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numerocasa,$telefone);
    if($c->cadastrar()){
        return true;
    }else{
    return false;
    }
 }
 public function testeEditaCliente($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone){
     $c=new Cliente(null,null,null,null,null,null,null,null,null,null);
     if($c->editar($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone)){
         return true;

     }else{
         return false;
     }
 }
 public function testeBuscaEspecifica($id){
    $c=new Cliente(null,null,null,null,null,null,null,null,null,null);
     if($c->busca_especifica($id) != null){
         return true;

     }else {
         return false;
     }
 }


}
?>