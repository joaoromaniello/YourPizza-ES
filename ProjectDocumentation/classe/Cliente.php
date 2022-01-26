<?php
require_once 'Conexao.php';
require_once 'Pessoa.php';
class Cliente extends Pessoa{
    function __construct($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numerocasa,$telefone){
        parent::__construct($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numerocasa,$telefone);
    }

public function cadastrar()
{
    try{
        $con=new Connection();
        $sql="insert into pessoa (nome,sobrenome,email,senha,cep,cidade,bairro,numerocasa,telefone) values(?,?,?,?,?,?,?,?,?)";
        $stmt=$con->pdo->prepare($sql);
        $this->password_hash_client=password_hash($this->getSenha(),PASSWORD_DEFAULT);
        //if(!empty($this->getNome()) && (!empty($this->getSobrenome())) && (!empty($this->getEmail())) && (!empty($this->getSenha())) && (!empty($this->getCep())) && (!empty($this->getCidade())) && (!empty($this->getBairro())) && (!empty($this->getNumeroCasa())) (!empty($this->getTelefone()))){
            if($stmt->execute(array($this->getNome(),$this->getSobrenome(),$this->getEmail(),$this->password_hash_client,$this->getCep(),$this->getCidade(),$this->getBairro(),$this->getNumeroCasa(),$this->getTelefone()))){
              $localId=$con->pdo->lastInsertId();
              print("meu id " .$localId);
              $sql2="INSERT INTO cliente(idpessoa) VALUES (?)";
              $query=$con->pdo->prepare($sql2);
              $query->execute(array($localId));



            }
        }//        //fim do if

    catch (PDOException $pdo){

        print("erro na transação nao foi possivel inserir\n");
        print($pdo->getMessage());

    }

  }   
  public function editar($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone){
    $con=new Connection();

    $sql ="UPDATE cliente JOIN pessoa ON cliente.idpessoa =pessoa.idpessoa
    set pessoa.nome=?,pessoa.sobrenome=?,pessoa.email=?,pessoa.cep=?,pessoa.cidade=?,pessoa.bairro=?,pessoa.numerocasa=?,pessoa.telefone=?
    WHERE
    pessoa.idpessoa=cliente.idpessoa";
    $prepare=$con->pdo->prepare($sql);
   if($prepare->execute(array($nome,$sobrenome,$email, $cep, $cidade, $bairro, $numerocasa, $telefone))){
       return true;
       
   }
   return false;
}
public function busca_especifica($id){
    $con=new Connection();

    $sql ="SELECT pessoa.nome,pessoa.sobrenome, pessoa.email,pessoa.cep,pessoa.cidade,pessoa.bairro,pessoa.numerocasa,pessoa.telefone FROM (pessoa JOIN cliente ON pessoa.idpessoa=cliente.idpessoa)
    WHERE
    pessoa.idpessoa=?";
    $prepare=$con->pdo->prepare($sql);
    if($prepare->execute(array($id))){
        if($prepare->rowCount()>0){
            return $prepare;
        }
    }
}

}
?>