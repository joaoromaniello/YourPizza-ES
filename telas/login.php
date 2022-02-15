<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/form.css">
    <title>pagina de login</title>


</head>
<body>
    <main>
    <form id="login_form" action="../processa/processalogin.php" method="post">
                            <div class="mb-2 col-md-6 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Email </label>
                                <input type="email" class="form-control semborda" id="email_login" placeholder="name@example.com" name="email_login" required>
                            </div>
                            <div class="col-md-6 mb-2 col-sm-6">
                                <label for="senha" class="form-label">senha</label>
                                <input type="password" class="form-control semborda" id="senha_login" required placeholder="digite aqui sua senha previamente cadastrada" name="senha_login">

                            </div>
                            <button type="submit" class="bnt btn-danger"> entrar</button>
                        </form>

                  
            


      
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>