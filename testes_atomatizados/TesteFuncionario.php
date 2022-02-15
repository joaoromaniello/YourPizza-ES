<?php
require_once '../classe/Funcionario.php';
class TesteFuncionario{
    public function testeCadastrar($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario){
        $f= new Funcionario($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario);
        if($f->cadastrar()){
            return true;
        }else{
            return false;
        }
    }
    public function testeBuscaFuncionario(){
        $f=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
        if($f->buscar()!=null){
            return true;

        }else{
            return false;
        }
    }
    public function testeDeletarFuncionario($id){
        $f=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
        if($f->deletar_funcionario($id)){
            return true;
            
        }else{
            return false;
        }

    }
    public function testeEditarFucionario($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario){
        $f=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
        if($f->editar($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario)){
            return true;
        }else{
           return  false;
        }        
    }
    
    public function testeBuscaPorIdFuncionario($id){
        $f=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
        if($f->busca_especifica($id)!=null){
            return true;

        }else{
            return false;
        }
    }
}
?>