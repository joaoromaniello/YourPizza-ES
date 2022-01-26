<?php
require_once 'Funcionario.php';
class Gerente extends Funcionario{
    function __construct($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario)
    {
        parent::__construct($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone,$cargo,$salario);

}

function cadastrar()
{
    try {
        $con = new Connection();
        $sql = "insert into pessoa (nome,sobrenome,email,senha,cep,cidade,bairro,numerocasa,telefone) values(?,?,?,?,?,?,?,?,?)";
        $stmt = $con->pdo->prepare($sql);
        $this->password_hash_client = password_hash($this->getSenha(), PASSWORD_DEFAULT);
        //if(!empty($this->getNome()) && (!empty($this->getSobrenome())) && (!empty($this->getEmail())) && (!empty($this->getSenha())) && (!empty($this->getCep())) && (!empty($this->getCidade())) && (!empty($this->getBairro())) && (!empty($this->getNumeroCasa())) (!empty($this->getTelefone()))){
        if ($stmt->execute(array($this->getNome(), $this->getSobrenome(), $this->getEmail(), $this->password_hash_client, $this->getCep(), $this->getCidade(), $this->getBairro(), $this->getNumeroCasa(), $this->getTelefone()))) {
            $localId = $con->pdo->lastInsertId();
            $sql2 = "INSERT INTO funcionario(idpessoa,cargo,salario) VALUES (?,?,?)";
            $query = $con->pdo->prepare($sql2);
            if($query->execute(array($localId, $this->getCargo(), $this->getSalario()))){
                $sql3 = "INSERT INTO gerente(idpessoa) VALUES (?)";
                $preparegerente=$con->pdo->prepare($sql3);
                if($preparegerente->execute(array($localId))){

                }
            }
        }
    } //        //fim do if

    catch (PDOException $pdo) {

        print("erro na transação nao foi possivel inserir\n");
        print($pdo->getMessage());
    }

}
}
?>