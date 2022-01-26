
<?php
require_once '../classe/Cliente.php';
require_once '../classe/Logar.php';
if(! isset($_SESSION)){
    session_start();
}
if(! isset($_SESSION["logado_cliente"])){
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
    <title>editar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <?php 
    
    $id=$_GET['id'];
    $cliente=new Cliente(null,null,null,null,null,null,null,null,null,null,null);
    $c=$cliente->busca_especifica($id);
    $cliente=$c->fetch(PDO::FETCH_ASSOC);
    ?>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Your Pizza</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="AdiminCliente.php">Inicio</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="geraPedido.php">Compra </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editCliente.php?id=<?php echo $_SESSION['Id_cliente'];?>">Editar sua Informações </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="historicoPedidos.php?id=<?php echo $_SESSION['Id_cliente'];?>">Visualizar seu histórico de pedidos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ListarPizzaSalvas.php?id=<?php echo $_SESSION['Id_cliente']; ?>">Exibir pizza salvas</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
    </header>

    <h1>Editar cliente</h1>

    
    <form action="../processa/processaEditCliente.php?id=<?php $id ?>" method="POST">

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control " id="nome" placeholder="nome_cliente" name="nome" value="<?php echo $cliente['nome']; ?>" required>
                    <label for="nome" id="lblNome"> Nome Cliente </label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="sobrenome" placeholder="sobrenome" name="sobrenome" value="<?php echo $cliente['sobrenome']; ?>" required>

                    <label for="sobrenome" id="lblsobrenome"> Sobrenome </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="email" placeholder="email" name="email"
                    value="<?php echo $cliente['email']; ?>" required>

                    <label for="email" id="lblemail"> E-mail </label>

                </div>
            </div>

            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cidade" placeholder="cidade" name="cidade"
                    value="<?php echo $cliente['cidade']; ?>" required>

                    <label for="cidade" id="lblcidade"> Cidade </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="cep" placeholder="cep" name="cep" value="<?php echo $cliente['cep']; ?>" required>

                    <label for="email" id="lblcep"> CEP </label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="bairro" placeholder="bairro" name="bairro"
                    value="<?php echo $cliente['bairro']; ?> "required>

                    <label for="bairro" id="lblbairro"> Bairro </label>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="numero_casa" placeholder="numero casa" name="numero_casa" value="<?php echo $cliente['numerocasa']; ?> " required>

                    <label for="numero_casa" id="lblnumero_casa"> Número da casa </label>

                </div>
            </div>
        </div>
<div class="row">
        <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="telefone" placeholder="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?> "required>

                    <label for="telefone" id="lbltelefone"> Número do telefone </label>

                </div>
            </div>
            
        </div>
               </div>
        <button type="submit" class="bnt btn-danger" name="btn_editar_cliente"> Editar cliente</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>