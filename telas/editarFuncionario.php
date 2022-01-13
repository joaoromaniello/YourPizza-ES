<?php
require_once '../classe/Funcionario.php';
require_once '../classe/Logar.php';
if(! isset($_SESSION)){
    session_start();
}
if(! isset($_SESSION["logado_gerente"])){
    echo '<a href="../telas/login.php">voltar a tela de login</a>';
    die("esta area é retrita");
}

?>

<!DOCTYPE html>


<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php 
    $id=$_GET['id'];
    $func=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
    $f=$func->busca_especifica($id);
    $funcionario=$f->fetch(PDO::FETCH_ASSOC);
    var_dump($funcionario['nome']);
    ?>
    <h1>Editar Funcionario</h1>
    <form action="../processa/processaedit.php?id=<?php $id ?>" method="POST">

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control " id="nome" placeholder="nome_funcionario" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
                    <label for="nome" id="lblNome"> nome cliente </label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="sobrenome" placeholder="sobrenome" name="sobrenome" value="<?php echo $funcionario['sobrenome']; ?>" required>

                    <label for="sobrenome" id="lblsobrenome"> sobrenome </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="email" placeholder="email" name="email"
                    value="<?php echo $funcionario['email']; ?>" required>

                    <label for="email" id="lblemail"> email </label>

                </div>
            </div>

            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cidade" placeholder="cidade" name="cidade"
                    value="<?php echo $funcionario['cidade']; ?>" required>

                    <label for="cidade" id="lblcidade"> cidade </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cep" placeholder="cep" name="cep" value="<?php echo $funcionario['cep']; ?>" required>

                    <label for="email" id="lblcep"> cep </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="bairro" placeholder="bairro" name="bairro"
                    value="<?php echo $funcionario['bairro']; ?> "required>

                    <label for="bairro" id="lblbairro"> bairro </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="numero_casa" placeholder="numero casa" name="numero_casa" value="<?php echo $funcionario['numerocasa']; ?> " required>

                    <label for="numero_casa" id="lblnumero_casa"> Numero da casa </label>

                </div>
            </div>
        </div>
<div class="row">
        <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="telefone" placeholder="telefone" name="telefone" value="<?php echo $funcionario['telefone']; ?> "required>

                    <label for="telefone" id="lbltelefone"> Numero do telefone </label>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cargo" placeholder="cargo" name="cargo"
                    value="<?php echo $funcionario['cargo']; ?> " required>

                    <label for="cargo" id="lblcargo">cargo </label>

                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        </div>
        <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="salario" placeholder="salario" name="salario" value="<?php echo $funcionario['salario']; ?>" required>

                    <label for="salario" id="lblsalario"> salario</label>

                </div>
        </div>
        <button type="submit" class="bnt btn-primary" name="btn_editar_funcionario"> Editar funcionario</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>