<?php

require_once "../model/bd_connect.php";

if (isset($_POST['cadastrarProduto'])) { // Verifica se houve o clique no botão cadastrar

  $nome = $_POST['nomeProduto'];
  $descricao = $_POST['descricaoProduto'];
  $valor = (float) $_POST['valorProduto'];
  $imagem = "../imgProduto/" . $_FILES['imgProduto']['name'];

  $formatosValidos = ["png", "jpg", "jpeg"];
  $extensao = pathinfo($_FILES['imgProduto']['name'], PATHINFO_EXTENSION); //Pega o nome da extensão da imagem

  if (in_array($extensao, $formatosValidos)) { //Verifica se a extensão é válida

    $sql = "INSERT INTO produtos (nome, descricao, valor, imagem) VALUES ('$nome', '$descricao', '$valor', '$imagem')";

    if (mysqli_query($connect, $sql)) { // Envia a consulta para o banco de dados.

      print "<script>alert('Produto cadastrado com sucesso!!!')</script>";
      header("Location: ../view/cadastroProdutos.html"); //Redireciona para a página de Produtos

    } else {

      print "<script>alert('Erro ao cadastrar Produto!!!')</script>";
      header("Location: ../view/cadastroProdutos.html"); //Redireciona para a página de Produtos

    }

    $tempPath = $_FILES['imgProduto']['tmp_name'];

    move_uploaded_file($tempPath, $imagem); //Move a imagem para a pasta imgProduto

  } else {

    print "<script>alert('Formato de arquivo inválido!!!')</script>";
    
  }
}

mysqli_close($connect);