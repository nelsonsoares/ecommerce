<?php
require_once '../model/bd_connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";

$dadosClientes = mysqli_query($connect, $sql);

$linha = mysqli_fetch_array($dadosClientes);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./css/main.css">
  <title>Login</title>
</head>

<body>
  <div class="container-fluid text-center">
    <div class="row">

      <div class="p-4 col-3 max-height-vh flex-column-center" id="bg-purple">
        <div class="container">
          <h1 class="text-light font-weight-300">
            <div class="font-weight-500 fs-2">Mantenha</div>
            <div class="fs-3">seus dados atualizados</div>
          </h1>
          <img src="img/update.svg" alt="">
        </div>
      </div>

      <div class="col-9 max-height-vh flex-column-center">
        <form action="../controller/controllerClientesUpdate.php" method="POST">
          <div class="container form-width border border-light-subtle rounded p-4 shadow bg-white">
            <div class="mb-4">
              <div class="mt-2"></div>
              <span class="fs-3 font-weight-500 font-color-dark">Atualize seus dados!</span><br>
            </div>
            <div class="text-start">
              <input type="hidden" name="id" value="<?php echo $id ?>">

              <label for="nome" class="font-color-dark">Nome</label>
              <input type="text" name="nome" id="nome" value="<?php echo $linha['nome'] ?>" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">

              <label for="email" class="mt-3" class="font-color-dark">E-mail</label>
              <input type="text" name="email" id="email" value="<?php echo $linha['email'] ?>" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">

              <label for="dataNascimento" class="mt-3" class="font-color-dark">Data de Nascimento</label>
              <input type="text" name="dataNascimento" id="dataNascimento" value="<?php echo date('d/m/Y', strtotime($linha['dataNascimento'])) ?>" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">

              <label for="senhaAtual" class="mt-3" class="font-color-dark">Senha Atual</label>
              <input type="password" name="senhaAtual" id="senha" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">

              <label for="senha" class="mt-3" class="font-color-dark">Nova Senha</label>
              <input type="password" name="novaSenha" id="novaSenha" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary max-width input-height rounded-pill flex-row-center btn-purple bd-purple" name="atualizar">Atualizar</button>
            </div>
            <div class="mt-3">
              <a href="home.html" class="fs-8 link-puple link-custom-purple">⟵ Voltar direto para <strong>Home</strong></a>
            </div>
          </div>
        </form>
        <p class="link-puple mt-5"><i class="bi bi-exclamation-circle-fill"></i> Caso não queira atualizar a senha mantenha os campos em branco!</p>
      </div>

    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>