<?php

require_once "../model/bd_connect.php";

if (isset($_POST['atualizarProduto'])) { // Verifica se houve o clique no botão cadastrar

  $id_produto = $_POST['id'];
  $novoNome = $_POST['nomeProduto'];
  $novaDescricao = $_POST['descricaoProduto'];
  $novoValor = (float) $_POST['valorProduto'];
  $novaImagem = $_FILES['imgProduto']['name'];

  if ($novaImagem != null) {

    $imagem = "../imgProduto/" . $_FILES['imgProduto']['name'];
    $sql = "UPDATE produtos SET nome='$novoNome', descricao='$novaDescricao', valor='$novoValor', imagem='$imagem' WHERE id=$id_produto";

    $tempPath = $_FILES['imgProduto']['tmp_name'];

    move_uploaded_file($tempPath, $novaImagem); //Move a imagem para a pasta imgProduto

  } else {

    $sql = "UPDATE produtos SET nome='$novoNome', descricao='$novaDescricao', valor='$novoValor' WHERE id=$id_produto";
  }
}

mysqli_query($connect, $sql);

mysqli_close($connect);

header("Location: ../view/listarProdutos.php");
