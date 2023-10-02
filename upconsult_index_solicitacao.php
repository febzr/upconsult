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
    <link rel="stylesheet" href="upconsult_index_solicitacao_style.css">
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

    <!-- Área de notificações empresa -->

    <main class="forms-mensagens-empresa">
        <!--Form de solicitação de consultoria-->
        <div class="form-empresa-solicitacao-consultoria">
            <h2>Solicitação de consultoria</h2>
            <form action="">
                <label for="titulo-solicitacao-empresa">Título da solicitação</label><br>
                <input type="text" name="titulo-solicitacao-empresa" id="titulosolicitacaoempresa" placeholder="Escreva aqui" required><br>
                <label for="descricao-solicitacao-empresa">Descrição de solicitação</label><br>
                <textarea name="descricao-solicitacao-empresa" id="descricaosolicitacaoempresa" cols="30" rows="10"
                    placeholder="Escreva aqui" required></textarea><br>
                <label for="area-de-consultoria-empresa">Área de consultoria</label><br>
                <select name="area-de-consultoria-empresa" id="areadeconsultoriaempresa" required>
                    <option value="vendas">Vendas</option>
                    <option value="gestao">Gestão</option>
                    <option value="financas">Finanças</option>
                    <option value="marketing">Marketing</option>
                    <option value="rh">Recursos Humanos</option>
                    <option value="ti">Tecnologia da informação</option>
                    <option value="sustentabilidade">Sustentabilidade</option>
                </select><br>
                <input type="submit" name="enviar-solicitacao" id="enviar-solicitacao"
                    value="Enviar solicitação de consultoria"><br>
            </form>
        </div>
    </main>
</body>

</html>
