async function criarListaClubes() {
    response = await fetch("./clubes");
    if (!response.ok) {
        throw new Error("Erro ao obter lista de clubes.");
    }
    clubes = await response.json();
    for (const clube of clubes) {
        const tr = document.createElement("tr");
        tr.className = "clubeItem";
        const td = [];
        for(let i = 0; i < 3; i++) {
            td[i] = tr.appendChild(document.createElement("td"));
        }
        td[0].appendChild(document.createTextNode(clube.id));
        td[1].appendChild(document.createTextNode(clube.clube));
        td[2].appendChild(document.createTextNode(clube.saldo_disponivel));
        document.getElementById("lista-clubes").insertAdjacentElement("beforeend", tr);
    }
}

async function criarListaRecursos() {
    response = await fetch("./recursos");
    if (!response.ok) {
        throw new Error("Erro ao obter lista de recursos.");
    }
    recursos = await response.json();
    for (const recurso of recursos) {
        const tr = document.createElement("tr");
        tr.className = "recursoItem";
        const td = [];
        for(let i = 0; i < 3; i++) {
            td[i] = tr.appendChild(document.createElement("td"));
        }
        td[0].appendChild(document.createTextNode(recurso.id));
        td[1].appendChild(document.createTextNode(recurso.recurso));
        td[2].appendChild(document.createTextNode(recurso.saldo_disponivel));
        document.getElementById("lista-recursos").insertAdjacentElement("beforeend", tr);
    }
}

async function criarClube() {
    let clube = clubeForm.clube.value;
    let saldo_disponivel = clubeForm.saldo_disponivel.value;
    if (clube == "" || saldo_disponivel == "") {
        alert("Valores inválidos");
        return;
    }
    let response = await fetch("./clubes", {
        method: "POST",
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify({"clube": clube, "saldo_disponivel": saldo_disponivel})
    });
    if (!response.ok) {
        let body = await response.json();
        alert(`Falha ao criar clube! ${body}`);
    } else {
        alert("Clube criado com sucesso!");
        atualizarListaClubes();
    }
}

function atualizarListaClubes() {
    let clubes = document.querySelectorAll(".clubeItem");
    clubes.forEach(clube => clube.remove());
    criarListaClubes();
}

async function consumirRecurso() {
    let clube_id = consumirRecursoForm.clube_id.value;
    let recurso_id = consumirRecursoForm.recurso_id.value;
    let valor_consumo = consumirRecursoForm.valor_consumo.value;
    if (clube_id == "" || recurso_id == "" || valor_consumo == "") {
        alert("Valores inválidos");
        return;
    }
    let response = await fetch("./consumirRecurso", {
        method: "POST",
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(
            {"clube_id": clube_id, 
            "recurso_id": recurso_id,
            "valor_consumo": valor_consumo
            })
    });
    if (!response.ok) {
        let body = await response.json();
        alert(`Falha ao consumir recurso! ${body}`);
    } else {
        alert("Recurso consumido com sucesso!");
        atualizarListaClubes();
        atualizarListaRecursos();
    }
}

function atualizarListaRecursos() {
    let recursos = document.querySelectorAll(".recursoItem");
    recursos.forEach(recurso => recurso.remove());
    criarListaRecursos();
}

var clubeForm = document.getElementById("criar-clube-form");
document.getElementById("criar-clube-btn").addEventListener("click", criarClube);

var consumirRecursoForm = document.getElementById("consumir-recurso-form");
document.getElementById("consumir-recurso-btn").addEventListener("click", consumirRecurso);