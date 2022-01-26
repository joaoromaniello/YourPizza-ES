<?php
require_once 'Conexao.php';

class PizzaComplemento{
    
    private $idpizza;
    private $idcomplemento;
    public function __construct($idpizza,$idComplemento)
    {
        $this->setIdPizza($idpizza);
        $this->setIdComplemento($idComplemento);        
    }
    public function setIdPizza($idpizza)
    {
        $this->idpizza=$idpizza;
    }
    public function getIdPizza()
    {
        return $this->idpizza;
    }
    public function setIdComplemento($idComplemento)
    {
        $this->idcomplemento=$idComplemento;
    }
    public function getIdComplemento()
    {
        return $this->idcomplemento;
    }
    public function cadastrar()
    {
        $conn=new Connection();

        $sql="INSERT INTO pizzacomplemento (idcomplemento,idproduto) Values (?,?)";
        $prepare=$conn->pdo->prepare($sql);
        if($prepare->execute(array($this->getIdComplemento(),$this->getIdPizza()))){
            print "<h1>sucesso</h1>";
        }
    }
}
?>