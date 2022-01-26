<?php
require_once '../classe/Logar.php';
require_once '../classe/Pedido.php';
require_once '../classe/Complemento.php';
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION["logado_cliente"])) {
  echo '<a href="../telas/login.php">voltar a tela de login</a>';
  die("esta area é retrita");
}

$verificaSN=0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>listar historico de pedidos</title>
<link rel="stylesheet" href="../css/tabelas.css">
</head>
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

  <table class="table">
    <thead>
      <?php
      $id = $_GET['id'];
      $pedido = new Pedido(null, null, null);
      $complemento = new Complemento(null, null);
      $lp = $pedido->listar_pedidosCliente($id);
      if ($lp == NULL) {

        die("<h1>Voce ainda nao fez nenhum pedido</h1>");
        exit();
      }


      ?>

      <tr>
        <th>Titulo do produto</th>
        <th>descrição do produto</th>
        <th>borda</th>
        <th>tamanho</th>
        <th>Complementos</th>
        <th>status pedidos</th>
        <th>data e hora</th>
        <th>preço</th>

       
        <th>Mudar Status</th>
             

        <th>Salvar nos favoritos</th>

      </tr>
    </thead>
    <tbody>
      <?php while ($p = $lp->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
          <td><?php echo $p['titulo']; ?></td>
          <td><?php echo $p['descricao']; ?></td>
          <td><?php echo $p['borda']; ?></td>
          <td><?php echo $p['tamanho']; ?></td>
          <?php $cp = $complemento->buscar_por_id($p['idproduto']);
          ?>
          <td><?php while ($c = $cp->fetch(PDO::FETCH_ASSOC)) {
                echo $c['nome'] . ' ';
              } ?></td>
          <td><?php echo $p['stutusPedido']; ?></td>
          <td><?php echo $p['data_hora']; ?></td>
          <td><?php echo $p['preco']; ?></td>
          <?php if ($p['stutusPedido'] == 'concluido' || $p['stutusPedido'] == 'cancelar' )  {  ?>
            <td>nao podemos alterar status de pedidos cancelados/concluidos</td>
           <?php }  else{?>
            <td><button class="btn" data-bs-toggle="modal" data-bs-target="#mudarStatus" name="btnmodal" id="mudarstatusbtn">Mudar Status Pedido</button></td>
 <?php }?>
            
  <div class="modal fade" id="mudarStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mudar status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="editarStatusPedidoscliente.php?id=<?php echo $p['idpedido']; ?>" method="POST">
            <div class="mb-3">
              <label for="changeStatus" class="col-form-label">Mudar Status</label>
              <select class="form-control" id="changeStatus" name="changeStatus">
                <option value="cancelar">Cancelar</option>

              </select>

            </div>

            <button type="submit" class="btn btn-danger" name="mudar_status">mudar status</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </form>
        </div>

      </div>
    </div>
  </div>
   <?php    ?>   


          <?php if ($p['stutusPedido'] == 'concluido') { ?>
          <td><a href="../processa/processaSalvarPizza.php?id=<?php echo $p['idproduto'] . '&' . 'idcliente=' .  $id; ?>"> Salvar nos favoritos</a></td>
        </tr>
    <?php }else{ ?>
      <td>Só paderá salvar a pizza depois de experimentar</td>
      <?php  }?>
          <?php } ?>
     


    </tbody>
  </table>






</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>