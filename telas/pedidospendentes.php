<?php
require_once '../classe/Logar.php';
require_once '../classe/Pedido.php';
require_once '../classe/Complemento.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pedidos Pendentes</title>
</head>
<body>
    <main>
        
        <table class="table">
            <?php
              $pedido=new Pedido(null,null,null);

            $lp=$pedido->listar_pedidos_pendentes();
            if($lp==NULL)
            {
                die("<h1> nao ha pedidos pendentes");
                exit();
            }
            ?>
            <thead>
                <tr>
                    <th>nome do cliente</th>
                    <th>Titulo do produto</th>
                    <th>descrição do produto</th>
                    <th>borda</th>
                    <th>tamanho</th>
                    <th scope="col">Complementos</th>
                    <th>status pedidos</th>
                    <th>data e hora</th>
                    <th>preço</th>
                    <th>Mudar Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $complemento=new Complemento(null,null);
                    
                    while($p=$lp->fetch(PDO::FETCH_ASSOC)){
                $cp=$complemento->buscar_por_id($p['idproduto']);
               

                ?>
                <tr>
                    <td><?php echo $p['nome']; ?></td>
                    <td><?php echo $p['titulo']; ?></td>
                    <td><?php echo $p['descricao']; ?></td>
                    <td><?php echo $p['borda']; ?></td>
                    <td><?php echo $p['tamanho']; ?></td>
                    <td><?php while ($c=$cp->fetch(PDO::FETCH_ASSOC)){  echo $c['nome'] .' ';    } ?></td>
                    <td><?php echo $p['stutusPedido']; ?></td>
                    <td><?php echo $p['data_hora']; ?></td>
                    <td><?php echo $p['preco']; ?></td>
                     <td><button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mudarStatus"  name="btnmodal">Mudar Status Pedido</button></td>
                </tr>
                <div class="modal fade" id="mudarStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mudar status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="editarStatusPedidosFunc.php?id=<?php echo $p['idpedido']?>" method="POST">
          <div class="mb-3">
            <label for="changeStatus" class="col-form-label">Recipient:</label>
            <select class="form-control" id="changeStatus" name="changeStatus">
                <option value="com entregrador">Com entregrador</option>
                <option value="preparando">preparando</option>
                <option value="concluido">Concluido</option>
            </select>

          </div>
  
          <button type="submit" class="btn btn-primary" name="mudar_status">mudar status</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </form>
      </div>
     
    </div>
  </div>

</div>
                <?php }?>
     
               
            </tbody>
        </table>



       




    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>