<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro complemento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>Cadastra Cliente</h1>
    <form action="../processa/ProcessaCadastroCliente.php" method="POST">

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control " id="nome_cliente" placeholder="nome cliente" name="nome" required>
                    <label for="nome_cliente" id="lblNome_cliente"> nome cliente </label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="sobrenome" placeholder="sobrenome" name="sobrenome" required>

                    <label for="sobrenome" id="lblsobrenome"> sobrenome </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="email" placeholder="email" name="email" required>

                    <label for="email" id="lblemail"> email </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="senha" placeholder="senha" name="senha" required>

                    <label for="email" id="lblsenha"> senha </label>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cidade" placeholder="cidade" name="cidade" required>

                    <label for="cidade" id="lblcidade"> cidade </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cep" placeholder="cep" name="cep" required>

                    <label for="email" id="lblcep"> cep </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="bairro" placeholder="bairro" name="bairro" required>

                    <label for="bairro" id="lblbairro"> bairro </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="numero_casa" placeholder="numero casa" name="numero_casa" required>

                    <label for="email" id="lblnumero_casa"> Numero da casa </label>

                </div>
            </div>
        </div>
<div class="row">
        <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="telefone" placeholder="telefone" name="telefone" required>

                    <label for="telefone" id="lbltelefone"> Numero do telefone </label>

                </div>
            </div>
        </div>
        <button type="submit" class="bnt btn-primary" name="btn_cadastrar_cliente"> Cdastrar Cliente</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>