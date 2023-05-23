<?php

require_once '../model/bd_connect.php';

if (isset($_GET['id'])) { // verifica se foi enviado o id para exclusão

  $id = $_GET['id'];

  $exclude = "DELETE FROM clientes WHERE id='$id'";

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
  <link rel="stylesheet" href="css/listaClientes.css">
  <link rel="stylesheet" href="css/home.css">
  <title>Login</title>
</head>

<body>
  <div class="container-fluid text-center">
    <div class="row vh-100">
      <div class="col-3 p-4 max-height-vh flex-column-center" id="bg-purple">
        <div class="container">
          <ul>
            <li>
              <a href="home.html" class="link-puple link-custom-white rounded-pill">⟵ Voltar para Home</a>
            </li>
          </ul>
          <h1 class="text-light font-weight-300 mt-5">
            <div class="font-weight-500 fs-2">Clientes Cadastrados</div>
            <div class="fs-3">confira a lista de todos os clientes</div>
          </h1>
          <img src="img/listarCliente.svg" alt="">
        </div>
      </div>

      <div class="col-9 max-height-vh flex-column-start p-5">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Data de Nascimento</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php // INICIO DA LISTAGEM DOS CLIENTES

            $sql = "SELECT * FROM clientes";
            $clientes = mysqli_query($connect, $sql);

            while ($linhas = mysqli_fetch_array($clientes)) { //INICIO DO WHILE
              
              $dataNascimento = $linhas['dataNascimento'];
              $dataNascimentoFormatada = date('d/m/Y', strtotime($dataNascimento));

            ?>

              <tr>
                <td><?php echo $linhas['id']; //ID 
                    ?></td>
                <td><?php echo $linhas['nome']; //Nome 
                    ?></td>
                <td><?php echo $linhas['email']; //Email 
                    ?></td>
                <td><?php echo $dataNascimentoFormatada; //Data de Nascimento 
                    ?></td>
                <td class="flex-row-center gap-2">
                  <div><a href="listaClientes.php?id=<?php echo $linhas['id']; ?>"><i class="bi bi-trash text-purple fs-5"></i></a></div>
                  <div><a href="cadastroClientesUpdate.php?id=<?php echo $linhas['id']; ?>"><i class="bi bi-pencil-square text-purple fs-5"></i></a></div>
                </td>
              </tr>

            <?php
            } //FIM DO WHILE E DA LISTAGEM DE CLIENTES
            mysqli_close($connect)
            ?>

          </tbody>
        </table>
      </div>
      <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>