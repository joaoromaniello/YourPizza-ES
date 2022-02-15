<?php
session_start();

require_once "Conexao.php";
class Logar
{


    public function __construct()
    {
    }
    public function login_cliente(String $email, string $senha)
    {
        $con = new Connection();
        $query = "SELECT pessoa.idpessoa, pessoa.email,pessoa.senha FROM pessoa JOIN cliente on pessoa.idpessoa=cliente.idpessoa where pessoa.email=?";
        $prepare = $con->pdo->prepare($query);
        if ($prepare->execute(array($email))) {
            if ($prepare->rowCount() > 0) {
                $c = $prepare->fetch(PDO::FETCH_ASSOC);
                if (password_verify($senha, $c['senha'])) {
                    $_SESSION['logado_cliente'] = true;
                    $_SESSION["Id_cliente"] = $c['idpessoa'];
                    return true;
                }
            }
        }
    }
    public function login_funcionario(String $email, string $senha)
    {
  
        $con = new Connection();
        $stmt = $con->pdo->prepare("SELECT * FROM pessoa");
        $stmt->execute();
        $pessoas = [];
        if ($stmt->rowCount() > 0) {
            $pessoas = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($pessoas as $key => $p) {
                if ($p->email == $email) {
                    $stmt = $con->pdo->prepare("SELECT * FROM gerente Where idpessoa=$p->idpessoa");
                    $stmt->execute();
                    if ($stmt->rowCount() == 0) {
                        if (password_verify($senha, $p->senha)) {
                            $_SESSION["logado_funcionario"] = true;
                            $_SESSION['id_funcionario'] = $p->idpessoa;
                                return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                    break;
                }
            }
        }
        //$stmt=$con->pdo->prepare("SELECT * FROM gerente Where " )


    }
    public function login_gerente(String $email, string $senha)
    {
        $query = "SELECT pessoa.idpessoa,pessoa.nome,pessoa.email,pessoa.senha FROM (pessoa JOIN funcionario ON funcionario.idpessoa=pessoa.idpessoa )JOIN gerente ON gerente.idpessoa=funcionario.idpessoa WHERE pessoa.email=?";
        $con = new Connection();

        $prepare = $con->pdo->prepare($query);
        if ($prepare->execute(array($email))) {
            if ($prepare->rowCount() > 0) {
                $g = $prepare->fetch(PDO::FETCH_ASSOC);
                if (password_verify($senha, $g['senha'])) {
                    $_SESSION['logado_gerente'] = true;
                    $_SESSION['id_gerente'] = $g['idpessoa'];
                    return true;
                }
            }
        }
    }
}
