<?php
include 'php/db.php';
session_start();
global $_SESSION;
$nome = $_SESSION['nome'];
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

    <link rel="stylesheet" href="./css/tela_erro_consultor_style.css">
    <script src="./script.js"></script>


    <title>Matchs insuficientes</title>

</head>

<body>

    <!-- Menu principal -->
    <header class="menu-principal">
        <figure class="imagem-logo">
            <img src="./Resources/Plataforma/geral-logo-amarela.png" alt="">
        </figure>
        <nav id="menu-opcoes">
            <ul>
                <li class="icone-menu mensagens"><a href="">
                        <img src="./Resources/Plataforma/geral-menu-mensagens.png" alt="">
                    </a></li>
                <li class="icone-menu agenda"><a href="">
                        <img src="./Resources/Plataforma/geral-menu-agenda.png" alt="">
                    </a></li>
                <li class="icone-menu notificacoes"><a href="">
                        <img src="./Resources/Plataforma/geral-menu-notificacoes.png" alt="">
                    </a></li>
                <li class="icone-menu-config"><a href="">
                        <img src="./Resources/Plataforma/geral-menu-configs.png" alt="">
                    </a></li>
            </ul>
        </nav>
    </header>


    <!-- Parte principal do consultor -->
    <main class="principal-consultor">
        <section class="info-principais">
            <div class="info-principais-card">
                <figure class="info-principais-foto-perfil">
                    <img src="./Resources/Plataforma/new.png" alt=""
                        id="info-principais-foto-consultor">
                </figure>
                <div>
                    <p class="info-principais-nome-consultor"><strong><?php echo $nome;?></strong></p>
                    <p class="info-principais-localizacao-consultor">Localização do Consultor</p>
                </div>
            </div>
            <div 
            class="info-principais-card-atendimento-consultor">
                <img src="./Resources/Plataforma/geral-atendimento.png" alt="">
            </div>
            
            <button class="info-principais-criar-feed-consultor" type="button" onclick="window.location.href='upconsult_index_carrossel.php'">
                <img src="./Resources/Plataforma/zap.png" alt="">
            </button>
        </section>

    </main>

<!-- Parte do Match consultor -->
<main class="carousel-container">
    <div class="carousel">
        <ul class="carousel-list">
            
            <li class="naoPossuiMatchs" id="naoPossuiMatchs">
                <p class="label-naoPossuiMatchs">Você não possui mais matchs disponíveis</p>
                <p class="naoPossuiMatchs-solicitacao"></p>
                </li>
                 
        </ul>
    </div>

</body>

</html>