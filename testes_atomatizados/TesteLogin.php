<?php
require_once '../classe/Logar.php';
class TesteLogin{
    public function TesteLoginFuncionario(String $email, string $senha){
        $f=new Logar();
        if($f->login_funcionario( $email,  $senha)){
            return true;

        }else{
            return false;
        }
    }
    public function testeLoginCliente(String $email, string $senha){
        $c=new Logar();
        if($c->login_cliente($email,$senha)){
            return true;
        }else{
            return false;
        }
        
    }
    public function testeLoginGerente(String $email, string $senha){
        $g=new Logar();
        if($g->login_gerente($email,$senha)){
            return true;

        }else{
            return false;
        }
    }
}
?>