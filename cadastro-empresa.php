<?php

include 'php/db.php';

if (isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_atual = date('d-m-Y');

    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

    if (empty($nome) || empty($cnpj) || empty($email) || empty($senha)){
        $_POST['er_cad'] = "1"; //Erro de campos vazios
        header("Refresh:1; url=cadastro-empresa.php");
        exit();
    }

    $sql = "SELECT cnpj FROM empresas WHERE cnpj = '$cnpj'";

    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0){
        $_POST['er_cad'] = "2"; //Erro de CNPJ já cadastrado
        header("Refresh:1; url=cadastro-empresa.php");
        exit();
    }

    else {
        $sql = "INSERT INTO empresas (nome, cnpj, email, senha, datacad) VALUES ('$nome', '$cnpj', '$email', '$senha_hashed', '$data_atual')";
        mysqli_query($conn, $sql);
        header('Location: confirmacao.html');
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

    <link rel="stylesheet" href="./cadastro-empresa.style.css">
    <script src="./script.js"></script>


    <title>Cadastro Empresa</title>

</head>

<body>
    <header>

        <div class="sup-cadempresa">
            <img src="Resources/Cadastro e Login images/logo-superior-direito.png" alt="">
        </div>
        </div>
        <div class="seta-empresa">
            <a href="quem-sou-eu-cadastro.html"><img src="Resources/Cadastro e Login images/conf-icon-seta-voltar.png" alt=""></a>
        </div>
        <div class="escuro-empresa">
            <ul>
                <li><a href=""><img src="Resources/Cadastro e Login images/icon-escuro.png" alt=""></a>
                </li>
                <li><a href=""><img src="Resources/Cadastro e Login images/icon-faq.png" alt=""></a>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <section>
            <h1>Cadastro</h1>
            <p>Preencha os dados solicitados com atenção</p>
            <form action="" method="post" id="form-empresa">
                <label for="nome">Nome/Razão Social</label><br>
                <input type="text" name="nome" id="nome" placeholder=" Digite seu nome"> <br>
                <label for="cnpj">CNPJ <span>00.000.000/0000-00</span></label><br>
                <input type="text" name="cnpj" id="cnpj" placeholder=" Digite seu CNPJ"> <br>
                <label for="email">Email <span>prefencialmente corporativo</span></label><br>
                <input type="email" name="email" id="email" placeholder=" Digite seu email"><br>
                <label for="senha">Senha</label><br>
                <label for="cidade-estado">Cidade-Estado <span>Ex: Recife-PE</span></label><br>
                <input type="cidade-estado" name="cidade-estado" id="cidade-estado" placeholder=" Digite sua cidade e a sigla do seu estado"><br>
                <input type="password" name="senha" id="senha" placeholder=" Digite sua senha"><br>
                <label for="confsenha">Confirme a senha</label><br>
                <input type="password" name="confsenha" id="confsenha" placeholder=" Confirme a senha"><br>
                <input type="submit" name="enviar" id="enviar" value="Cadastrar">
            </form>
        </section>
        <section class="i-empresa">
            <img src="Resources/Cadastro e Login images/cadastro-image.png" alt="">
        </section>
        <div class="pag-empresa">
            <img src="Resources/Cadastro e Login images/logo-footer.png" alt="">
        </div>
    </main>
    <footer>
        <img src="Resources/Cadastro e Login images/detalhe-inferior-esquerdo.png" alt="">
    </footer>
</body>

</html>