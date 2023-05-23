<?php

require_once '../model/bd_connect.php';
require_once '../../vendor/autoload.php';

$data = new \Cocur\Slugify\Slugify();

if (!isset($_POST['atualizar'])) {

  header("Location: ../view/cadastroClientes.html");
  print "<script>alert('ERRO: Atualização não pode ser realizada!!!');</script>";
} else {

  $id_cliente =  $_POST['id'];
  $novoNome = $_POST['nome'];
  $novoEmail = $_POST['email'];
  $dataNascimento = DateTime::createFromFormat("d/m/Y", $data->slugify($_POST['dataNascimento'], "/"));
  $novaData = $dataNascimento->format("Y-m-d");
  $senhaAtual = $_POST['senhaAtual'];
  $novaSenha = $_POST['novaSenha'];

  if ($senhaAtual != null and $novaSenha != null) {

    $cliente = mysqli_query($connect, "SELECT * FROM clientes WHERE id=$id_cliente");
    $bd_senha = password_verify($senhaAtual, mysqli_fetch_array($cliente)['senha']);

    if ($bd_senha === true) {

      $hash = password_hash($_POST['novaSenha'], PASSWORD_DEFAULT);
      $sql = "UPDATE clientes SET nome='$novoNome', email='$novoEmail', dataNascimento='$novaData', senha='$hash' WHERE id=$id_cliente";
      mysqli_query($connect, $sql);
      header("Location: ../view/listaClientes.php");
      print "<script>alert('Atualização realizada com sucesso!');</script>";
    }

  } else {
    
    $sql2 = "UPDATE clientes SET nome='$novoNome', email='$novoEmail', dataNascimento='$novaData' WHERE id=$id_cliente";
    mysqli_query($connect, $sql2);
    header("Location: ../view/listaClientes.php");
    print "<script>alert('Atualização realizada com sucesso!');</script>";
  }
}

mysqli_close($connect);
