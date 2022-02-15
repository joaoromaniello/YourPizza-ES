<?php
require_once '../classe/Complemento.php';
class TesteComplemento{
    public function testeCadastraComplemento($nome,$quantidade){
        $c=new Complemento($nome,$quantidade);
        if($c->cadastrar()){
            return true;
        }else{
            return false;
        }

    }
    public function testeBusca(){
        $c=new Complemento(null,null);
        if($c->buscar() !=null){
            return true;
        }else{
            return false;
        }
    }
    public function testedecrementar_quantidade_conplementos($idComplemento){
        $c=new Complemento(null,null);
        if($c->decrementar_quantidade_conplementos($idComplemento)){
            return true;

        }else{
            return false;
        }
    }
    public function testeBuscaPorId($id){
        $c=new Complemento(null,null);
        if($c->buscar_por_id($id)){

            return true;
        }else{
            return false;
        }
    }
    
}
?>