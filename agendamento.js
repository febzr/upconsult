
// Função para adicionar um evento à lista

function adicionarEvento(nomeEmpresa, dataAtendimento, horaAtendimento) {
    
    const eventosLista = document.getElementById("eventos-lista");
  
    const eventoElement = document.createElement("div");
    eventoElement.classList.add("evento");
  
    
    const nomeDaEmpresaElement = document.createElement("p");
    nomeDaEmpresaElement.classList.add("label-nomeDaEmpresa");
    nomeDaEmpresaElement.textContent = "Empresa:";
    const nomeSolicitacaoElement = document.createElement("p");
    nomeSolicitacaoElement.classList.add("nome-solicitacao");
    nomeSolicitacaoElement.textContent = nomeEmpresa;
  
    const dataElement = document.createElement("p");
    dataElement.classList.add("label-data");
    dataElement.textContent = "Data do atendimento:";
    const dataSolicitacaoElement = document.createElement("p");
    dataSolicitacaoElement.classList.add("data-solicitacao");
    dataSolicitacaoElement.textContent = dataAtendimento;
  
    const horaElement = document.createElement("p");
    horaElement.classList.add("label-hora");
    horaElement.textContent = "Hora do atendimento:";
    const horaSolicitacaoElement = document.createElement("p");
    horaSolicitacaoElement.classList.add("hora-solicitacao");
    horaSolicitacaoElement.textContent = horaAtendimento;
  
   
    eventoElement.appendChild(nomeDaEmpresaElement);
    eventoElement.appendChild(nomeSolicitacaoElement);
    eventoElement.appendChild(dataElement);
    eventoElement.appendChild(dataSolicitacaoElement);
    eventoElement.appendChild(horaElement);
    eventoElement.appendChild(horaSolicitacaoElement);
  
   
    eventosLista.appendChild(eventoElement);
  }
  
  
  adicionarEvento(nomesol, data, hora);