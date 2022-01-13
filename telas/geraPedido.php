<?php
require_once '../classe/Complemento.php';     
require_once '../classe/Logar.php';
if(! isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["logado_cliente"])){


    echo "<a href='login.php'>Voltar para a pagina de login</a>";
    die("<h1>para realizar um pedido voce precisa esta logado por favor, isso é para melhor a tende-los.</h1>");
}   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Monte sua pizza</title>
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
       <form action="../processa/processapedido.php" method="post">
      <div class="row">
          <div class="col-md-6 mt-4"></div>
       <select name="tamanho" id="tamanho" class="form-select form-select">
               
           <option value="padrao">selecione um tamanho</option>
               
               <option value="grande">grande</option>
               <option value="media">media</option>
               <option value="pequena">pequena</option>
           </select>
           <div class="col-md-6 mt-4">
           <label for="nome"> nome da sua pizza</label><input type="text" name="nome" id="nome" placeholder="de um nome para sua pizza" required>
           </div>
           </div>
           <div class="row m-2"></div>
            <div class="col md-6">           
            <label for="descriao"> descricao da sua pizza</label> <textarea name="descricao" id="descriao"
            class="form-control" cols="30" rows="10" placeholder="digite uma descricao para sua pizza" required></textarea>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
           <label for="borda">quer borda</label><select name="borda" id="borda" class="form-control">
               <option value="sim">sim</option>
               <option value="nao">nao</option>
           </select>
           </div>   
        </div>

        <?php  
        $complememto=new Complemento(null,null);
        $resultadoBusca=$complememto->buscar();
        if($resultadoBusca==null){
            echo "<script >alert('estamos sem complemento lamentamos e ja ja reestabelecemos o estoque');<script >";
        }
     
            
        ?>
     
        <?php while ($item =$resultadoBusca->fetch(PDO::FETCH_ASSOC)){?>
            <div class="row mt-3">
            <div class="col-md-6">
            <label for="<?php echo $item['idcomplemento']?>"><?php echo $item['nome']; ?></label>
            <input type="checkbox" name="complementos[]" id="<?php echo $item['idcomplemento']; ?>" class="complementos" value="<?php echo $item['idcomplemento']; ?>" class ="form-control">
            
        <?php } ?>
            </div>
            </div>
            
        <div class="row">
            <div class="col-md-6  mb-5" >
      <label for="preco">preço a pagar</label>  <input type="text"id="preco" name="valor_pagar" class="form-control">
            </div>
            <div class=" row mb-2">
                <div class="col-md-2">
        <input type="submit" value=" pedir" name="btnPedido" class=" btn btn-primary">
            </div>
                <div class ="col-md-1">
        <input type="reset" id="reset" value="reset" name="reset" class=" btn btn-primary">
            </div>
            </div>
    </form>
    </main>
    <script src="../js/cria_pizza.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>