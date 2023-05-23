<?php
require_once '../model/bd_connect.php';

if (isset($_GET['id'])) { // verifica se foi enviado o id para exclusão

  $id = $_GET['id'];

  $exclude = "DELETE FROM produtos WHERE id='$id'";

  mysqli_query($connect, $exclude);
}
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
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/listaClientes.css">
  <link rel="stylesheet" href="css/listaProdutos.css">
  <title>Login</title>
</head>

<body>
  <div class="container-fluid text-center">
    <div class="row vh-100">

      <div class="col-3 p-4 flex-column-center" id="bg-purple">
        <div class="container">
          <ul>
            <li>
              <a href="home.html" class="link-puple link-custom-white rounded-pill">⟵ Voltar para Home</a>
            </li>
          </ul>
          <h1 class="text-light font-weight-300 mt-5">
            <div class="fs-2 font-weight-500">Produtos Cadastrados</div>
            <div class="fs-3">confira a lista de todos os produtos</div>
          </h1>
          <img src="img/product-presentation.svg" alt="">
        </div>
      </div>

      <div class="col-9 flex-wrap p-custom">

        <?php // INICIO DA LISTAGEM DOS CLIENTES
        $sql = "SELECT * FROM produtos";
        $produtos = mysqli_query($connect, $sql);

        while ($linhas = mysqli_fetch_array($produtos)) { //INICIO DO WHILE

        ?>
          <div class="card img-width border-purple p-0" style="max-height:500px">
            <img src="<?php echo "./imgProduto/" . $linhas['imagem']; //Imagem
                      ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title fs-5 fw-bold font-color-dark"><?php echo $linhas['nome']; //Nome Produto 
                                                                  ?></h5>
              <p class="card-text f-size font-color-dark"><?php echo $linhas['descricao']; //Descrição 
                                                          ?></p>
              <p class="fs-5 fw-bold font-color-dark m-0"><?php echo 'R$ ' . $linhas['valor']; //Valor 
                                                          ?></p>
              <div class="mt-2 flex-row-center font-color-dark">
                <button type="submit" class="btn btn-primary max-width-2 input-height rounded-pill flex-row-center btn-purple bd-purple mb-3" name="cadastrarProduto">Add Carinho</button>
              </div>
              <div>
                <a href="listarProdutos.php?id=<?php echo $linhas['id']; ?>"><i class="bi bi-trash text-purple fs-5"></i></a>
                <a href="cadastroProdutosUpdate.php?id=<?php echo $linhas['id']; ?>"><i class="bi bi-pencil-square text-purple fs-5"></i></a>
              </div>
            </div>
          </div>

        <?php } //FIM DO WHILE E DA LISTAGEM DE CLIENTES
        mysqli_close($connect)
        ?>
      </div>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>