
document.addEventListener("DOMContentLoaded", function () {
    const primeiroSelect = document.getElementById("areadeconsultoriaempresa");
    const segundoSelect = document.getElementById("tipo-de-problema-empresa");

    // Um objeto que mapeia categorias para suas respectivas opções
    const opcoesPorCategoria = {
        vendas: ["Minha empresa não consegue vender os produtos", "Não tenho demanda para minha área de atuação", "Como posso ampliar minhas redes de varejo?"],
        gestao: ["Minha empresa não possui gestor", "Não consigo gerir minha empresa", "Como posso aplicar a gestão de pessoas na minha empresa?"],
        financas: ["Não entendo do mercado financeiro", "Não consigo ter um retorno positivo", "Tenho problemas no caixa"],
        marketing: ["Não tenho retorno nas redes sociais", "Não sei investi no mercado digital", "Não sei como contratar profissionais qualificados na área"],
        rh: ["Como posso contratar bons profissionais?"],
        ti: ["Como posso entrar no mercado de TI?", "Como consegui projetos sendo freelancer", "Não consigo inovar na área de TI"],
        sustentabilidade: ["Gerar menos impactos ao meio ambiente", "Otimizar setores e evitar desperdício"],
    };

    // Função para atualizar as opções do segundo select
    function atualizarSegundoSelect() {
        const categoriaSelecionada = primeiroSelect.value;
        const opcoes = opcoesPorCategoria[categoriaSelecionada] || [];
        
        // Limpa as opções existentes
        segundoSelect.innerHTML = "";
        
        // Adiciona as novas opções
        opcoes.forEach(function (opcao) {
            const option = document.createElement("option");
            option.textContent = opcao;
            segundoSelect.appendChild(option);
        });
    }

    // Chama a função quando o primeiro select é alterado
    primeiroSelect.addEventListener("change", atualizarSegundoSelect);

    // Inicializa o segundo select com as opções da categoria padrão
    atualizarSegundoSelect();
});
