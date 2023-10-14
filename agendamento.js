
document.addEventListener("DOMContentLoaded", function () {
    const eventoForm = document.getElementById("evento-form");
    const eventosLista = document.getElementById("eventos-lista");

    eventoForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const nome = document.getElementById("nome").value;
        const data = document.getElementById("data").value;
        const hora = document.getElementById("hora").value;

        // Crie um elemento div para exibir o evento
        const eventoDiv = document.createElement("div");
        eventoDiv.classList.add("evento");

        // Crie o conteúdo do evento
        eventoDiv.innerHTML = `
            <h2>${nome}</h2>
            <p>Data: ${data}</p>
            <p>Hora: ${hora}</p>
        `;

        // Adicione o evento à lista
        eventosLista.appendChild(eventoDiv);

        // Limpe o formulário
        eventoForm.reset();
    });
});
