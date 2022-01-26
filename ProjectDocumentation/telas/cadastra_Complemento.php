<?php
require_once '../classe/Logar.php';
if(! isset($_SESSION)){
    session_start();
}
if( !(isset($_SESSION["logado_funcionario"])) && !isset($_SESSION["logado_gerente"] )){
    echo '<a href="../telas/login.php">voltar a tela de login</a>';
    die("<h1>esta area é retrita</h1>");
}
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro complemento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <h1>Cadastra complemento</h1>
    <form action="../processa/ProcessaCadastroComplemento.php" method="post">

        <div class="row">
            <div class="col-md-6">
         <label for="complementos">Complementos</label>   <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" id="Complemento" name="complemento_nome" required>
                    <option value="complemento alho">complemento alho</option>
                    <option value="complemento brocolis">complemento brocolis</option>
                    <option value="complemento calabresa">complemento calabresa</option>
                    <option value="complemento catupiry">complemento catupiry</option>
                    <option value="complemento cebola">complemento cebola</option>

                    <option value="complemento frango">complemento frango</option>

                    <option value="complemento gorgonzola">complemento gorgonzola</option>
                    <option value="complemento manjericao">complemento manjericao</option>

                    <option value="complemento mussarela">complemento mussarela</option>

                    <option value="complemento oleo">complemento_oleo</option>
                    <option value="complemento oregano">complemento oregano</option>
                    <option value="complemento parmesao">complemento parmesao</option>
                    <option value="complemento presunto">complemento presunto</option>
                    <option value="complemento provolone"> complemento provolone</option>
                    <option value="complemento tomate">complemento tomate</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="qtdcomplemento" placeholder="quantidade" name="qtdcomplemento" required>
                    <label for="qtdcomplemento" id="lblqtdcomplemento"> quantidade </label>
                </div>
            </div>
        </div>

        <button type="submit" class="bnt btn-danger" name="btn_cadastrar_complemento"> Cdastrar Complemento</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>