<?php
include 'db.php';

$cnpj = $_POST['cnpj'];
$senha = $_POST['senha'];

// Busca a senha do banco de dados
$sql = "SELECT senha FROM consultor WHERE cnpj = '$cnpj'";
$result = mysqli_fetch_array(mysqli_query($conn, $sql));
$senha_fromdb = $result['senha'];

// Verifica se a senha está certa
$senha_decrypted = password_verify($senha, $senha_fromdb);
echo $senha_decrypted;

// Retorna o resultado para a página
if($senha_decrypted == '1'){
    session_start(); //Inicia a sessão
    $_COOKIE['cnpj'] = $cnpj; //Monta o cookie CNPJ
    header('Location: ../upconsult_index.html');

} else {
    // erro de login vai aqui
}
?>