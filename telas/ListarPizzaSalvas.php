<?php
require_once '../classe/Logar.php';
require_once '../classe/Pizza.php';
require_once '../classe/Complemento.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pizzas salvas</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">your pizza</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="AdiminCliente.php">inicio</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="geraPedido.php">Compra </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="editCliente.php?id=<?php echo $_SESSION['Id_cliente'];?>">Editar sua Informações </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="historicoPedidos.php?id=<?php echo $_SESSION['Id_cliente'];?>">visualizar seu histórico de pedidos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ListarPizzaSalvas.php?id=<?php echo $_SESSION['Id_cliente']; ?>">Exibir pizza salvas</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
    </header>
<main class="container-fluid">
    <?php 
        $pizza=new Pizza(null,null,null,null);
        $prepizza=$pizza->buscar_pizza_favoritas($_SESSION['Id_cliente']);
        if($prepizza==null){
            die("<h1>não ha pizza salva ainda</h1>");
            exit();
        }
    
    ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descricao</th>
            <th scope="col">Borda</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Complementos</th>
            <th scope="col"> Comprar novamente</th>
            </tr>
        </thead>
        <tbody>
        <?php 
    $pizza=new Pizza(null,null,null,null);
    $prepizza=$pizza->buscar_pizza_favoritas($_SESSION['Id_cliente']);
 
    if($prepizza==null){
        die("nao ha pizza salva ainda");
    }
    $complemento=new Complemento(null,null);
    while($pi=$prepizza->fetch(PDO::FETCH_ASSOC)){

            $cp=$complemento->buscar_por_id($pi['idproduto']);
           
        
    ?>
            <tr>
                <td><?php echo $pi['titulo']; ?></td>
                <td><?php echo $pi['descricao']; ?></td>
                <td><?php echo $pi['borda']; ?></td>
                <td><?php echo $pi['tamanho']; ?></td>
                
                <td><?php while ($c=$cp->fetch(PDO::FETCH_ASSOC)){  echo $c['nome'] .' ';    } ?></td>
              
               
                <td><a href="../processa/processa_novo_pedido.php?idproduto=<?php echo $pi['idproduto'].'&'. 'idCliente='. $_SESSION['Id_cliente']. '&preco='. $pi['preco']?>">Comprar</a></td>

            <?php } ?>
         
        </tbody>

    </table>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>