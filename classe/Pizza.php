<?php
require_once '../classe/Produto.php';
class Pizza extends Produto{
    private  $borda;
    private $tamanho;
    public function __construct($titulo,$descricao,$borda,$tamanho)
    {
        parent::__construct($titulo,$descricao);
        $this->setBorda($borda);
        $this->setTamanho($tamanho);
    }
    public function setBorda($borda){
        $this->borda=$borda;
    }
    public function getBorda()
    {
        return $this->borda;
    }
    public function setTamanho($tamanho)
    {
        $this->tamanho=$tamanho;
    }
    public function getTamanho()
    {
      return $this->tamanho;
    }
    public function cadastrar()
    {
        try {
            $con=new Connection();
                $con->pdo->beginTransaction();
                $cadastra_em_produto="INSERT INTO produto (titulo,descricao) Values (?,?)";
                $prepare_cadastra_produto=$con->pdo->prepare($cadastra_em_produto);
                if($prepare_cadastra_produto->execute(array($this->getTitulo(),$this->getDescricao()))){
                    $last_insertId=$con->pdo->lastInsertId();
    
                    $cadastra_em_pizza="INSERT INTO pizza (idproduto,borda,tamanho) Values (?,?,?)";
                    $prepare_cadastra_pizza=$con->pdo->prepare($cadastra_em_pizza);
                    if($prepare_cadastra_pizza->execute(array($last_insertId,$this->getBorda(),$this->getTamanho())));
                    $con->pdo->commit();
                    return $last_insertId;
        }    
    
    }catch(PDOException $pdo){
            
            $con->pdo->rollBack();
    }

}
public function salvar_pizza($pizza,$idCliente){
    $con=new Connection();
    $sql="INSERT INTO pizza_salvas (idproduto,idpessoa) VALUES (?,?)";
    $prepare=$con->pdo->prepare($sql);
    if($prepare->execute(array($pizza,$idCliente))){
        return true;
    }
     return false;
}
public function buscar_pizza_favoritas($idCliente){
    $con=new Connection();
    $sql ="SELECT produto.idproduto,produto.titulo,produto.descricao,pizza.borda,pizza.tamanho,pedido.preco from pizza_salvas JOIN produto ON produto.idproduto=pizza_salvas.idproduto JOIN pizza on pizza.idproduto=pizza_salvas.idproduto JOIN pedido ON produto.idproduto=pedido.idproduto WHERE pedido.idpessoa=? GROUP BY pedido.idproduto";


    $prepare=$con->pdo->prepare($sql);
    if($prepare->execute(array($idCliente))){
        if($prepare->rowCount()>0){
            return $prepare;
        }
        return null;
    }
}
}
