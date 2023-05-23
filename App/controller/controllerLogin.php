<?php

require_once '../model/bd_connect.php';

$email = $_POST['email'];
$senha  = $_POST['senha'];

$sql = "SELECT * FROM clientes";

$resultadoConsulta = mysqli_query($connect, $sql);

$linha = mysqli_fetch_array($resultadoConsulta);

$email_db = $linha['email'];
$senha_db = $linha['senha'];

$senhaVerificada = password_verify($senha, $senha_db);

if ($email_db === $email and $senhaVerificada === true) {
  header("Location: ../view/home.html");
} else {
  header("Location: ../view/login.html");
}

mysqli_close($connect);