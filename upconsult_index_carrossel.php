<?php

include 'php/db.php';
session_start();
global $_SESSION;

function carrossel() {
    global $conn, $titulo, $descricao, $area, $id;
    $db = "SELECT * FROM solicitacoes WHERE concluido = '0' ORDER BY RAND() LIMIT 1";
    $result = mysqli_fetch_array(mysqli_query($conn, $db));

    $titulo = $result['titulo'];
    $id = $result['uniqueid'];
    $descricao = $result['descricao'];
    $area = $result['area'];

}

function carrossel_dere() {
    global $conn, $titulo, $descricao, $area, $id;
    $db = "SELECT * FROM solicitacoes WHERE uniqueid = '$id'";
    $result = mysqli_fetch_array(mysqli_query($conn, $db));

    $titulo = $result['titulo'];
    $id = $result['uniqueid'];
    $descricao = $result['descricao'];
    $area = $result['area'];
}

carrossel();

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

if (isset($_GET´['prox'])) {
    carrossel();
}

if (isset($_GET['voltar'])) {
    carrossel_dere();
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
    <link rel="stylesheet" href="upconsult_index_carrossel_style.css">
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

    <!-- Área de carrosel do consultor -->

        <main class="carousel-container">
            <div class="carousel">
                <ul class="carousel-list">
                    <li class="titulo" id="titulo">
                        <p class="titulo-solicitacao"><?php echo $titulo;?></p>
                        </li>
                    <li class="descricao" id="descricao">
                        <p class="descricao-solicitacao"><?php echo $descricao;?></p>
                        </li>
                    <li class="tipo" id="tipo">
                        <p class="tipo-solicitacao"><?php echo $area;?></p>
                        </li>
                    
                </ul>
            </div>

            <form method="POST" action="">
                <!-- Seus campos de entrada aqui -->
                <button type="submit" name="aceitar" id="aceitar">Aceitar Proposta</button>
            </form>

            <form method="GET" action="">
                <!-- Seus campos de entrada aqui -->
                <button type="submit" name="voltar" id="voltar">Anterior</button>
            </form>

            <form method="GET" action="">
                <!-- Seus campos de entrada aqui -->
                <button type="submit" name="prox" id="prox">Próximo</button>
            </form>
        </main>
    <script src="carrossel.js"></script>
        
</body>

</html>
