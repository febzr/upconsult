
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
    <link rel="stylesheet" href="upconsult_index_pagamento_consultor_style.css">
    <script src="https://sdk.mercadopago.com/js/v2">
    </script>

</head>

<body>

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("YOUR_PUBLIC_KEY");
    </script>

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
                    <p class="info-principais-localizacao-consultor">Localização da empresa</p>
                </div>
            </div>
            <div 
            class="info-principais-card-atendimento-consultor">
                <img src="./Resources/Plataforma/geral-atendimento.png" alt="">
            </div>
            
            <button class="info-principais-criar-feed-consultor" type="button" onclick="window.location.href='upconsult_index_solicitacao.php'">
                <img src="./Resources/Plataforma/empresa-realizar-solicitacao.png" alt="">
            </button>
        </section>

    </main>


  <div id="paymentBrick_container">
  </div>
  <script>
    const mp = new MercadoPago('YOUR_PUBLIC_KEY', {
    locale: 'pt-BR'
  });
  const bricksBuilder = mp.bricks();
    const renderPaymentBrick = async (bricksBuilder) => {
      const settings = {
        initialization: {
          /*
            "amount" é a quantia total a pagar por todos os meios de pagamento com exceção da Conta Mercado Pago e Parcelas sem cartão de crédito, que têm seus valores de processamento determinados no backend através do "preferenceId"
          */
          amount: 10000,
          preferenceId: "<PREFERENCE_ID>",
          payer: {
            firstName: "",
            lastName: "",
            email: "",
          },
        },
        customization: {
          visual: {
            style: {
              theme: "default",
            },
          },
          paymentMethods: {
            creditCard: "all",
						debitCard: "all",
						ticket: "all",
						bankTransfer: "all",
						atm: "all",
						onboarding_credits: "all",
						wallet_purchase: "all",
            maxInstallments: 12
          },
        },
        callbacks: {
          onReady: () => {
            /*
             Callback chamado quando o Brick está pronto.
             Aqui, você pode ocultar seu site, por exemplo.
            */
          },
          onSubmit: ({ selectedPaymentMethod, formData }) => {
            // callback chamado quando há click no botão de envio de dados
            return new Promise((resolve, reject) => {
              fetch("/process_payment", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
                body: JSON.stringify(formData),
              })
                .then((response) => response.json())
                .then((response) => {
                  // receber o resultado do pagamento
                  resolve();
                })
                .catch((error) => {
                  // manejar a resposta de erro ao tentar criar um pagamento
                  reject();
                });
            });
          },
          onError: (error) => {
            // callback chamado para todos os casos de erro do Brick
            console.error(error);
          },
        },
      };
      window.paymentBrickController = await bricksBuilder.create(
        "payment",
        "paymentBrick_container",
        settings
      );
    };
    renderPaymentBrick(bricksBuilder);
</script>

</body>

</html>
