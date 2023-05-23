<?php
require_once '../model/bd_connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";

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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/cadastroProduto.css">
  <link rel="stylesheet" href="css/uploud.css">
  <link rel="stylesheet" href="css/home.css">
  <title>Login</title>
</head>

<body>
  <div class="container-fluid text-center">
    <div class="row">

      <div class="col-3 p-4 max-height-vh flex-column-center" id="bg-purple">
        <div class="container">
          <ul>
            <li>
              <a href="home.html" class="link-puple link-custom-white rounded-pill">⟵ Voltar para Home</a>
            </li>
          </ul>
          <h1 class="text-light font-weight-300 mt-5">
            <div class="font-weight-500 fs-2">Atualize seu produto</div>
            <div class="fs-3">mantenha seus produtos atualizados!</div>
          </h1>
          <img src="img/update-produto.svg" alt="">
        </div>
      </div>

      <div class="col-9 max-height-vh flex-column-center">
        <form action="../controller/controllerProdutosUpdate.php" method="POST" enctype="multipart/form-data">
          <div class="container form-width border border-light-subtle rounded p-4 shadow bg-white" id="form">
            <div class="mb-4">
              <div class="mt-2"></div>
              <span class="fs-3 font-weight-500 font-color-dark">Atualizar Produto</span><br>
            </div>
            <div class="text-start">
              <input type="hidden" name="id" value="<?php echo $id ?>">

              <label for="nomeProduto" class="font-color-dark">Nome do Produto</label>
              <input type="text" name="nomeProduto" id="nomeProduto" value="<?php echo $linha['nome'] ?>" class="form-control rounded-pill input-height bg-light bd-purple focus-purple font-color-dark">

              <label for="descricaoProduto" class="mt-3" class="font-color-dark">Descrição</label>
              <textarea name="descricaoProduto" id="descricaoProduto" cols="30" rows="10" class="form-control input-height bg-light bd-purple focus-purple font-color-dark"><?php echo $linha['descricao'] ?></textarea>

              <label for="valorProduto" class="mt-3" class="font-color-dark">Valor</label>
              <input type="text" name="valorProduto" id="valorProduto" value="<?php echo $linha['valor'] ?>" class="form-control rounded-pill input-height bg-light lightProduto bd-purple focus-purple font-color-dark">

              <div class="mt-3">
                <label for="formFile" class="form-label">Upload de Imagem</label>
                <input class="form-control" type="file" id="formFile" name="imgProduto">
              </div>
            </div>

            <div class="mt-4 flex-row">
              <button type="submit" class="btn btn-primary max-width input-height rounded-pill flex-row-center btn-purple bd-purple" name="atualizarProduto">Atualizar</button>
            </div>
          </div>
          <p class="link-puple mt-5"><i class="bi bi-exclamation-circle-fill"></i> Caso não queira atualizar a imagem não anexe um novo arquivo</p>
        </form>
      </div>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="js/upload.js"></script>
</body>

</html>