<?php
require_once 'Conexao.php';
require_once 'Pessoa.php';
class Funcionario extends Pessoa
{
    private $cargo, $salario;

    function __construct($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario)
    {
        parent::__construct($nome, $sobrenome, $email, $senha, $cep, $cidade, $bairro, $numerocasa, $telefone);

        $this->setCargo($cargo);
        $this->setSalario($salario);
    }
    public function setSalario($salario)
    {
        $this->salario = (double)$salario;
    }
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    public function getSalario()
    {
        return $this->salario;
    }
    public function getCargo()
    {
        return $this->cargo;
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
                print("meu id " . $localId);
                $sql2 = "INSERT INTO funcionario(idpessoa,cargo,salario) VALUES (?,?,?)";
                $query = $con->pdo->prepare($sql2);
                $query->execute(array($localId, $this->getCargo(), $this->getSalario()));
            }
        } //        //fim do if

        catch (PDOException $pdo) {

            print("erro na transação nao foi possivel inserir\n");
            print($pdo->getMessage());
        }
    }
    public function buscar(){
        $con=new Connection();
        $sql="SELECT pessoa.idpessoa,pessoa.nome,pessoa.sobrenome, pessoa.email,pessoa.cep,pessoa.cidade,pessoa.bairro,pessoa.numerocasa,pessoa.telefone,funcionario.cargo,funcionario.salario FROM (pessoa JOIN funcionario ON pessoa.idpessoa=funcionario.idpessoa)";
        $prepare=$con->pdo->prepare($sql);
        if($prepare->execute()){
            if($prepare->rowCount()>0){
                return $prepare;
            }else{
                return null;
            }
        }
    }
    public function deletar_funcionario($id){
        $sql ="DELETE funcionario,pessoa FROM (funcionario JOIN pessoa ON funcionario.idpessoa =pessoa.idpessoa)
        WHERE
        funcionario.idpessoa=?";
        $con=new Connection();
        $prepare=$con->pdo->prepare($sql);
        if($prepare->execute(array($id))){

        }

    }
    public function busca_especifica($id){
        $con=new Connection();

        $sql ="SELECT pessoa.nome,pessoa.sobrenome, pessoa.email,pessoa.cep,pessoa.cidade,pessoa.bairro,pessoa.numerocasa,pessoa.telefone,funcionario.cargo,funcionario.salario FROM (pessoa JOIN funcionario ON pessoa.idpessoa=funcionario.idpessoa)
        WHERE
        pessoa.idpessoa=?";
        $prepare=$con->pdo->prepare($sql);
        if($prepare->execute(array($id))){
            if($prepare->rowCount()>0){
                return $prepare;
            }
        }
    }
    public function editar($nome, $sobrenome, $email, $cep, $cidade, $bairro, $numerocasa, $telefone, $cargo, $salario){
        $con=new Connection();

        $sql ="UPDATE funcionario JOIN pessoa ON funcionario.idpessoa=pessoa.idpessoa
        SET pessoa.nome=?,pessoa.sobrenome=?, pessoa.email=?,pessoa.cep=?,pessoa.cidade=?,pessoa.bairro=?,pessoa.numerocasa=?,pessoa.telefone=?,funcionario.cargo=?,funcionario.salario=?
        WHERE 
        funcionario.idpessoa=pessoa.idpessoa";
        $prepare=$con->pdo->prepare($sql);
        if($prepare->execute(array($nome,$sobrenome,$email,$cep,$cidade,$bairro,$numerocasa,$telefone,$cargo,$salario)));
    }
    
}
