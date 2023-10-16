<?php
include 'php/db.php';
session_start();
global $_SESSION;

$nome = $_SESSION['nome'];
$idsol = $_SESSION['idsol'];
$cnpj = $_SESSION['cnpj'];

$db = "INSERT INTO sugconsultor (idsolicitacao, nomeconsultor, cnpjconsultor) VALUES ('$idsol', '$nome', '$cnpj');";
mysqli_query($conn, $db);

$db = "SELECT * FROM solicitacoes WHERE uniqueid = $idsol;";
$result = mysqli_fetch_array(mysqli_query($conn, $db));

$nomesol = $result['nomesol'];
$data = $result['sugdata'];
$hora = $result['sughora'];
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upconsult</title>

    <!--
        FONTES:
            font-family: 'Inter', sans-serif;
            font-family: 'Montserrat', sans-serif;
        CORES PRINCIPAIS:
            azul: #121276
            amarelo: #E5C73F
            cinza claro: #D9D9D9
            cinza escuro: #1E1E26
            verde: #0B9F08
    -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="icon" type="image/png" href="./Resources/Plataforma/geral-logo-amarela.png">
    <link rel="stylesheet" href="upconsult_index_agendamento_consultor_style.css">
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

    <!-- Agendamento -->
    <div class="agenda">
        <h1>Minha Agenda</h1>
        <ul class="agendamentos">
                    
            <li class="nomeDaEmpresa" id="nomeDaEmpresa">
                <p class="label-nomeDaEmpresa">Empresa:</p>
                <p class="nome-solicitacao"><?php echo $nomesol;?></p>
                    </li>
            <li class="data" id="data">
                <p class="label-data">Data do atendimento:</p>
                <p class="data-solicitacao"><?php echo $data;?></p>
                    </li>
            <li class="hora" id="hora">
                <p class="label-hora">Hora do atendimento:</p>
                <p class="hora-solicitacao"><?php echo $hora;?></p>
                    </li>                 
        </ul>

        <div id="eventos-lista"></div>

    </div>
    <script src="agendamento.js"></script>

        
</body>

</html>
