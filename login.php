<?php
include 'php/db.php';

if (isset($_POST['enviar'])) {

    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    $data_atual = date('d-m-Y');

    $sql = "SELECT senha FROM consultor WHERE cnpj = '$cnpj'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));
    if (mysqli_fetch_array(mysqli_query($conn, $sql)) > 0) {
        $senha_fromdb = $result['senha'];
        $senha_decrypted = password_verify($senha, $senha_fromdb);
        if ($senha_decrypted == '1') {
            session_start();
            $_COOKIE['cnpj'] = $cnpj;
            $sql = "UPDATE consultor SET ultlog = '$data_atual' WHERE cnpj = '$cnpj'";
            mysqli_query($conn, $sql);
            header('Location: upconsult_index.php');
        } else {
            $_POST['er_login'] = "1"; //Erro de senha incorreta
            header("Refresh:1; url=login.php");
            exit();
        }
    } 
    
    else {
        $sql = "SELECT senha FROM empresas WHERE cnpj = '$cnpj'";
        $result = mysqli_fetch_array(mysqli_query($conn, $sql));
        if (mysqli_fetch_array(mysqli_query($conn, $sql)) > 0) {
            $senha_fromdb = $result['senha'];
            $senha_decrypted = password_verify($senha, $senha_fromdb);
            if ($senha_decrypted == '1') {
                session_start();
                $_COOKIE['cnpj'] = $cnpj;
                $sql = "UPDATE empresas SET ultlog = '$data_atual' WHERE cnpj = '$cnpj'";
                mysqli_query($conn, $sql);
                header('Location: upconsult_index.php');
            } else {
                $_POST['er_login'] = "1"; //Erro de senha incorreta
                header("Refresh:1; url=login.php");
                exit();
            }
        } else {
            $_POST['er_login'] = "2"; //Erro de nao existencia de usuario
            header("Refresh:1; url=login.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--
        FONTES:
            font-family: 'Inter', sans-serif;
            font-family: 'Montserrat', sans-serif;
    -->
    <link rel="icon" type="image/png" href="./Resources/Plataforma/geral-logo-amarela.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--
        Arquivos locais
    -->

    <link rel="stylesheet" href="./login-style.css">
    <script src="./script.js"></script>


    <title>Login - Upconsult</title>

</head>
<STYLE>
    A {
        text-decoration: none;
    }
</STYLE>

<body>

    <header>
        <div class="sup-login">
            <img src="Resources/Cadastro e Login images/logo-superior-direito.png" alt="">
        </div>
        <div class="logo-esquerda">
            <a href="index.html"><img src="Resources/Cadastro e Login images/login-logo-topo.png" alt=""></a>
        </div><br>
        <div class="escuro-login">
            <ul>
                <li><a href=""><img src="Resources/Cadastro e Login images/icon-escuro.png" alt=""></a>
                </li>
                <li><a href=""><img src="Resources/Cadastro e Login images/icon-faq.png" alt=""></a>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <section class="i-login">
            <img src="Resources/Cadastro e Login images/login-image.png" alt="">
        </section>
        <section>
            <h1>Login</h1>
            <p>Olá, insira seus dados cadastrados</p><br>
            <form action="" method="post">
                <label for="cnpj">CNPJ</label><br>
                <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ"><br>
                <label for="">Senha</label><br>
                <input type="password" name="senha" id="senha" placeholder="Insira a senha"><br><br>
                <input type="submit" name="enviar" id="enviar" value="Entrar">
            </form>
            <div class="cad-login">
                <a href="quem-sou-eu-cadastro.html">Cadastrar-se</a>
            </div><br>

            <div class="esqc-passw">
                <a href="recuperacao-senha.php">Esqueci minha senha</a>
            </div>

        </section><br><br><br><br><br><br><br>
        <div class="pag-login">
            <img src="Resources/Cadastro e Login images/logo-footer.png" alt="">
        </div>
    </main>
    <footer>
        <img src="Resources/Cadastro e Login images/detalhe-inferior-esquerdo.png" alt="">
    </footer>

</body>

</html>