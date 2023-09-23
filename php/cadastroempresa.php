<?php

include 'db.php';

$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO empresas (nome, cnpj, email, senha) VALUES ('$nome', '$cnpj', '$email', '$senha_hashed')";

mysqli_query($conn, $sql);
header('Location: ../login-empresa.html');

?>