<?php
 abstract class Pessoa{
    private  $nome;
    private   $sobrenome;
    private   $email;
    private  $senha;
    private  $cep;
    private  $cidade;
    private  $bairro;
    private  $telefone;
    private  $numerocasa;


function __construct($nome,$sobrenome,$email,$senha,$cep,$cidade,$bairro,$numerocasa,$telefone)

{
    $this->setCep($cep);
    $this->setBairro($bairro);
    $this->setNome($nome);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setCidade($cidade);
    $this->setSobrenome($sobrenome);
    $this->setNumeroCasa($numerocasa);
    $this->setTelefone($telefone);
    


    
}
public function setNome($nome){
    $this->nome = $nome;
}
public function getNome(){
    return $this->nome;
}
public function setSobrenome($sobrenome){
    $this->sobrenome = $sobrenome;
}
public function getSobrenome(){
    return $this->sobrenome;
}
public function setSenha($senha){
    $this->senha=$senha;
}
public function getSenha(){
    return $this->senha;
}
public function setEmail($email){
    $this->email= $email;

}
public function getEmail(){
    return $this->email;
}
public function setCep($cep){
    $this->cep= $cep;
}
public function getCep(){
    return $this->cep;
}
public function setCidade($cidade){
    $this->cidade = $cidade;
}
 public function getCidade(){
     return $this->cidade;
 }
 public function setBairro($bairro){
     $this->bairro = $bairro;
 }
 public function getBairro(){
     return $this->bairro;
 }
 public function setTelefone($telefone){
     $this->telefone= $telefone;
 }
 public function getTelefone(){
     return $this->telefone;
     
 }
 

  
  public function setNumeroCasa($num){
      $this->numerocasa=$num;
  }
  public function getNumeroCasa(){
      return $this->numerocasa;
  }


 public abstract function cadastrar();

}

?>