<?php
require_once '../classe/Funcionario.php';
require_once '../classe/Logar.php';

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['logado_gerente'])){
    echo '<a href="login.php">voltar a tela de login</a>';
    die("<h1>faça login para acessar essa area</h1>");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tabelas.css">
    
    <title>listar Funcionarios cadastrados</title>

</head>
<body>
    <?php
        $func=new Funcionario(null,null,null,null,null,null,null,null,null,null,null);
        $arrayfucs=$func->buscar();
        if($arrayfucs==null){
            print "<h1> Nao ha Funcionarios cadastrados</h1>";
        
        }
    ?>
<main>
<table class="table">
  <thead>
    <tr>
      <th scope="col">nome</th>
      <th scope="col">sobrenome</th>
      <th scope="col">email</th>
      <th scope="col">cidade</th>
        <th scope="col">cep</th>
        <th scope="col">bairro</th>
        <th scope="col">numero casa</th>
        <th scope="col">cargo</th>
        <th scope="col">salario</th>
        <th scope="col">telefone</th>
        <th scope="col">editar</th>
        <th scope="col">excuir</th>
        
      
    </tr>

  </thead>
  <tbody>
      <?php
      $id=$_GET['id']; 
      if($arrayfucs==null)
        die();
      ?>
      <?php
      while($funcs=$arrayfucs->fetch(PDO::FETCH_ASSOC)){
       
      ?>
    <tr>
    <td><?php echo $funcs['nome']; ?></td>
    <td><?php echo $funcs['sobrenome']; ?></td>
    <td><?php echo $funcs['email']; ?></td>
    <td><?php echo $funcs['cidade']; ?></td>
    <td><?php echo $funcs['cep']; ?></td>
    <td><?php echo $funcs['bairro']; ?></td>
    <td><?php echo $funcs['numerocasa']; ?></td>
    <td><?php echo $funcs['cargo']; ?></td>
    <td><?php echo $funcs['salario']; ?></td>
    <td><?php echo $funcs['telefone']; ?></td>
    <td><a href="../telas/editarFuncionario.php?id=<?php echo $funcs['idpessoa']; ?>">Editar</a></td>
    <td><a href="../processa/processaDel.php?id=<?php echo $funcs['idpessoa']; ?>">X</a></td>


    </tr>
    <?php } ?>
    
  </tbody>
</table>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>