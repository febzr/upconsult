<?php
include 'php/db.php';
session_start();
global $_SESSION;
$nome = $_SESSION['nome'];
$cnpj = $_SESSION['cnpj'];

try {
    $db = "SELECT * FROM sugconsultor WHERE idsolicitacao = (SELECT uniqueid FROM solicitacoes WHERE cnpjsol = $cnpj) ORDER BY RAND() LIMIT 1;";
    $result = mysqli_fetch_array(mysqli_query($conn, $db));

    $consultor = $result['nomeconsultor'];
    $cnpjcons = $result['cnpjconsultor'];
    $idsol = $result['idsolicitacao'];
    $uniqueid = $result['uniqueid'];

    $db = "SELECT * FROM consultor WHERE cnpj = $cnpjcons;";
    $result = mysqli_fetch_array(mysqli_query($conn, $db));

    $local = $result['cidest'];

    $db = "SELECT * FROM solicitacoes WHERE uniqueid = $idsol;";
    $result = mysqli_fetch_array(mysqli_query($conn, $db));

    $data = $result['sugdata'];
    $hora = $result['sughora'];
    $area = $result['area'];

    if ($area == 'vendas') {
        $area = "Vendas";
    }
    if ($area == 'gestao') {
        $area = "Gestão";
    }
    if ($area == 'marketing') {
        $area = "Marketing";
    }
    if ($area == 'financas') {
        $area = "Finanças";
    }
    if ($area == 'rh') {
        $area = "Recursos Humanos";
    }
    if ($area == 'ti') {
        $area = "Tecnologia da Informação";
    }
    if ($area == 'sustentabilidade') {
        $area = "Sustentabilidade";
    }
}

catch (Exception $e) {
    header('Location: tela_erro_empresa.php');
    exit();

}

// if isset($_POST['aceitar']) {}

if (isset($_GET['prox'])) {
    $db = "DELETE FROM sugconsultor WHERE uniqueid = $uniqueid;";
    mysqli_query($conn, $db);
    header('Location: index_empresa.php');
    exit();
}

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
    <link rel="stylesheet" href="./css/index.css">
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


    <!-- Parte principal da Empresa -->
    <main class="principal-consultor">
        <section class="info-principais">
            <div class="info-principais-card">
                <figure class="info-principais-foto-perfil">
                    <img src="./Resources/Plataforma/new.png" alt=""
                        id="info-principais-foto-consultor">
                </figure>
                <div>
                    <p class="info-principais-nome-consultor"><strong><?php echo $nome;?></strong></p>
                    <p class="info-principais-localizacao-consultor">Localização da empresa</p>
                </div>
            </div>
            <div 
            class="info-principais-card-atendimento-consultor">
                <img src="./Resources/Plataforma/geral-atendimento.png" alt="">
            </div>
            
            <button class="info-principais-criar-feed-consultor" type="button" onclick="window.location.href='solicitacao_empresa.php'">
                <img src="./Resources/Plataforma/empresa-realizar-solicitacao.png" alt="">
            </button>
        </section>

    </main>

    <!-- Parte do Match Empresa -->
    <main class="carousel-container">
        <div class="carousel">
            <ul class="carousel-list">
                    
                <li class="nomeDoConsultor" id="nomeDoConsultor">
                    <p class="label-nomeDoConsultor">Consultor:</p>
                    <p class="nomeDoConsultor-solicitacao"><?php echo $consultor;?></p>
                    </li>
                <li class="localidadeConsultor" id="localidadeConsultor">
                    <p class="label-localidadeConsultor">Localidade:</p>
                    <p class="localidadeConsultor-solicitacao"><?php echo $local;?></p>
                    </li>
                <li class="especialidadeConsultor" id="especialidadeConsultor">
                    <p class="label-especialidadeConsultor">Especialidade do Consultor:</p>
                    <p class="especialidadeConsultor-solicitacao"><?php echo $area;?></p>
                    </li>         
            </ul>
        </div>

        <form method="POST" action="">
            <!-- Seus campos de entrada aqui -->
            <button type="submit" name="aceitar" id="aceitar"> 
                <figure class="like">
                    <img src="./Resources/Plataforma/3.png" alt=""
                        id="like">
                </figure> 
            </button>
        </form>

        <form method="GET" action="">
            <!-- Seus campos de entrada aqui -->
            <button type="submit" name="prox" id="prox" value="1"> 
                <figure class="dislike">
                    <img src="./Resources/Plataforma/2.png" alt=""
                        id="dislike">
                </figure>    
            </button>
        </form>
    </main>

    <script src="./upconsult-script.js" type="js"></script>
</body>

</html>
