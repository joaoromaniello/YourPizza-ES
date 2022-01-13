<?php
abstract class  Produto{
    private  $titulo;
    private  $descricao;

    public function __construct($titulo,$descricao)
    {
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
    }
    
    public function setTitulo($titulo){
        $this->titulo =$titulo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public abstract function cadastrar();


}
?>