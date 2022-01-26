<?php
require_once 'Conexao.php';
class Pedido{
    private $idProduto;
    private $idcliente;
    private $statusPedido;
    private $preco;
    public function __construct($idProduto,$idcliente,$preco)
    {
        $this->setIdProduto($idProduto);
        $this->setIdCliente($idcliente);
        $this->setPreco($preco);
        $this->setStatusPedido("pendente");
        
    }
      public function setIdProduto($idProduto)
      {
          $this->idProduto=$idProduto;
      }
      public function getIdProduto()
      {
          return $this->idProduto;
      }
      public function setIdCliente($idcliente)
      {
         $this->idcliente=$idcliente;
      }
      public function getIdCliente()
      {
        return $this->idcliente;
      }
      public function setStatusPedido($statusPedido)
      {
         $this->statusPedido=$statusPedido;
      }
      public function getStatusPedido()
      {
          return $this->statusPedido;
      }
      public function setPreco($preco)
      {
          $this->preco=(float)$preco;
      }
      public function getPreco()
      {
         return $this->preco;
      }
      public function cadastrar()
      {
          $con= new Connection();
          $sql= "INSERT INTO pedido (idproduto,idpessoa,stutusPedido,data_hora,preco) VALUES (?,?,?,now(),?)";
          $prepare=$con->pdo->prepare($sql);
          if($prepare->execute(array($this->getIdProduto(),$this->getIdCliente(),$this->getStatusPedido(),$this->getPreco()))){
              
          }
      }
      public function listar_pedidos_pendentes(){
        $con= new Connection();

          $sql="SELECT pedido.idproduto,pedido.idpedido, pessoa.nome,produto.titulo,produto.descricao,pizza.borda,pizza.tamanho,pedido.stutusPedido,pedido.data_hora,pedido.preco FROM pedido JOIN pessoa ON pessoa.idpessoa=pedido.idpessoa JOIN produto ON pedido.idproduto=produto.idproduto JOIN pizza ON pizza.idproduto=pedido.idproduto WHERE pedido.stutusPedido <> 'concluido'";
          $prepare=$con->pdo->prepare($sql);
          if($prepare->execute()){
              if($prepare->rowCount()>0){
                  return $prepare;
              }else{
                  return null;
              }

          }
      }
      public function listar_pedidosCliente($id){
        $con= new Connection();

          $sql="SELECT pedido.idpedido, pessoa.nome,produto.titulo,produto.descricao,pizza.borda,pizza.tamanho,pedido.stutusPedido,pedido.idproduto,pedido.data_hora,pedido.preco FROM pedido JOIN pessoa ON pessoa.idpessoa=pedido.idpessoa JOIN produto ON pedido.idproduto=produto.idproduto JOIN pizza ON pizza.idproduto=pedido.idproduto WHERE pedido.idpessoa=?";
          $prepare=$con->pdo->prepare($sql);
          if($prepare->execute(array($id))){
              if($prepare->rowCount()>0){
                  return $prepare;
              }else{
                  return null;
              }

          }
      }
      public function mudar_status($id,$status){
        $con= new Connection();

          $sql ="UPDATE pedido 
          SET stutusPedido=?
          WHERE
          idpedido=?";
          $prepare=$con->pdo->prepare($sql);
          if($prepare->execute(array($status,$id))){
              return true;
          }
          return false;
      }
    }