<?php
require_once 'Conexao.php';
class Complemento {
private $nome,$quantidade;
public function __construct($nome,$quantidade)
{
    $this->setNome($nome);
    $this->setQuantidade($quantidade);
}
public function setNome($nome)
{
    $this->nome =$nome;
}
public function getNome(){
    return $this->nome;

}
public function setQuantidade($quantidade){
    $this->quantidade=$quantidade;
}
public function getQuantidade(){
    return $this->quantidade;
}
public function cadastrar(){
    $con=new Connection();

    $sql="INSERT INTO complemento (nome,quantidade) Values(?,?)";
    $prepare=$con->pdo->prepare($sql);
    if($prepare->execute(array($this->getNome(),$this->getQuantidade())));
}
public function buscar(){
    $con=new Connection();
    $sql="SELECT idcomplemento,nome FROM complemento 
    WHERE
    quantidade>0
     ";
    $prepare=$con->pdo->prepare($sql);
    $prepare->execute();
    if($prepare->rowCount()>0){
        return $prepare;
    }
    return null;
}
public function decrementar_quantidade_conplementos($idComplemento){
$con =new Connection();
$sql ="UPDATE complemento 
set quantidade =quantidade-1
WHERE quantidade>0 && idcomplemento =?
LIMIT 1";
$prepare=$con->pdo->prepare($sql);
if($prepare->execute(array($idComplemento))){
    
}
}
public function buscar_por_id($id){
    $con =new Connection();
    $sql='SELECT complemento.idcomplemento, complemento.nome FROM complemento JOIN pizzacomplemento ON complemento.idcomplemento=pizzacomplemento.idcomplemento WHERE pizzacomplemento.idproduto=?';
    $prepare=$con->pdo->prepare($sql);
    if($prepare->execute(array($id))){
        if($prepare->rowCount()>0){
            return $prepare;
        }
        return null;
    }

}
}
?>