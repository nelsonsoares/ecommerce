<?php

require_once '../model/bd_connect.php';
require_once '../../vendor/autoload.php';

$data = new \Cocur\Slugify\Slugify();

if (!isset($_POST['cadastrarHome'])) {

  header("Location: ../view/cadastroClientesHome.html");

  echo "<script>alert('ERRO: Cadastro não pode ser realizado!!!');</script>";
} else {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $dataNascimento = DateTime::createFromFormat("d/m/Y", $data->slugify($_POST['dataNascimento'], "/"));
  $novaData = $dataNascimento->format("Y-m-d");
  $senha  = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO clientes (nome, email, dataNascimento, senha) VALUES ('$nome', '$email', '$novaData', '$senha')";

  mysqli_query($connect, $sql);

  header("Location: ../view/cadastroClientesHome.html");
}

mysqli_close($connect);
