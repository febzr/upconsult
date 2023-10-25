<?php

include 'php/db.php';
session_start();
global $_SESSION;
$idprop = $_SESSION['idprop'];

$db1 = "SELECT * FROM solicitacoes WHERE uniqueid = '$idprop'";
$result1 = mysqli_fetch_array(mysqli_query($conn, $db1));

if (isset($_POST['enviar-proposta-de-solução'])) {

    $descricaoSolucao = $_POST['descricaoSolucao'];
    $dataAtendimentoConsultor = $_POST['dataAtendimentoConsultor'];
    $horaAtendimentoConsultor = $_POST['horaAtendimentoConsultor'];
    $cnpjcons = $_SESSION['cnpj'];

    if (empty($descricaoSolucao) || empty($dataAtendimentoConsultor) || empty($horaAtendimentoConsultor)) {
        $_POST['trigger'] = "1"; //Erro de campos vazios
        echo "<script>alert('Preencha todos os campos!');</script>";
        header("Refresh:1; url=index_indicacao.php");
        exit();
    }

    $sql = "UPDATE solicitacoes SET propsol = '$descricaoSolucao', datamarc = '$dataAtendimentoConsultor', horamarc = '$horaAtendimentoConsultor', cnpj_cons = '$cnpjcons' WHERE uniqueid = '$idprop'";
    mysqli_query($conn, $sql);
    $_POST['trigger'] = "2"; //Solicitação enviada com sucesso
    echo "<script>alert('Proposta enviada com sucesso!');</script>";
    header('Location: index_consultor.php');
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
    <link rel="stylesheet" href="./css/index_indicacao.css">
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
    <main class="forms-indicacao-consultor">
        <!-- Form de proposta de solução -->
        <div class="form-indicacao-cosultor">
            <h2>Proposta de solução</h2>
            <div class="card-solicitacao">
                <div>
                    <figure>
                        <img src="./Resources/Plataforma/geral-foto-perfil-two.png" alt=""
                                class="proposta-foto-usuario-empresa">
                    </figure>
                    <div>
                        <p class="proposta-nome-empresa"><?php echo $result1['nome'] ?></p>
                        <p class="proposta-area-consultoria"></p>
                        <p class="proposta-cidade-empresa">Cidade da empresa</p>
                    </div>
                </div>
                <div>
                    <p class="proposta-titulo"><?php echo $result1['titulo'] ?></p>
                    <p class="proposta-descricao-empresa"><?php echo $result1['descricao'] ?></p>
                </div>
            </div>
            <form action="" method="post" class="form" id="proposta-consultor">
                <label for="descricaoSolucao">Descrição da solução</label><br>
                <textarea name="descricaoSolucao" id="descricaoSolucao" cols="30" rows="10" placeholder="Escreva aqui"
                    required></textarea><br>
                <label for="dataAtendimentoConsultor">Sugestão de data para atendimento</label><br>
                <input type="date" id="dataAtendimentoConsultor" name="dataAtendimentoConsultor" required><br>
                <label for="horaAtendimentoConsultor">Sugestão de hora para atendimento</label><br>
                <input type="time" id="horaAtendimentoConsultor" name="horaAtendimentoConsultor" required><br>
                <button type="submit" name="enviar-proposta-de-solução" id="enviar-proposta-de-solução">Enviar proposta de solução</button>
            </form>
        </div>
    </main>
        
</body>

</html>
