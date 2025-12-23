let isAdmin = false;

async function carregarDados() {
  const res = await fetch("../backend/dados/listar.php");
  const dados = await res.json();

  const lista = document.getElementById("lista");
  lista.innerHTML = "";

  dados.forEach(d => {
    const li = document.createElement("li");
    li.textContent = `${d.titulo} - ${d.descricao} `;

    if (isAdmin) {
      const btnEditar = document.createElement("button");
      btnEditar.textContent = "Editar";
      btnEditar.onclick = () => abrirEdicao(d);

      const btnExcluir = document.createElement("button");
      btnExcluir.textContent = "Excluir";
      btnExcluir.onclick = () => excluirDado(d.id);

      li.appendChild(btnEditar);
      li.appendChild(btnExcluir);
    }

    lista.appendChild(li);
  });
}

async function criarDado() {
  const formData = new FormData();
  formData.append("titulo", document.getElementById("titulo").value);
  formData.append("descricao", document.getElementById("descricao").value);

  const res = await fetch("../backend/dados/criar.php", {
    method: "POST",
    body: formData
  });

  if (res.ok) {
    carregarDados();
  } else {
    alert("Apenas admin pode criar");
  }
}

async function excluirDado(id) {
  const formData = new FormData();
  formData.append("id", id);

  const res = await fetch("../backend/dados/excluir.php", {
    method: "POST",
    body: formData
  });

  if (res.ok) {
    carregarDados();
  } else {
    alert("Apenas admin pode excluir");
  }
}

// Inicialização correta
(async () => {
  const res = await fetch("../backend/auth/verifica_login.php");

  if (!res.ok) {
    window.location.href = "index.html";
    return;
  }

  const data = await res.json();

  if (data.perfil === "ADMIN") {
    isAdmin = true;
    document.getElementById("adminArea").style.display = "block";
  }

  carregarDados();
})();

function abrirEdicao(dado) {
  document.getElementById("editArea").style.display = "block";
  document.getElementById("editId").value = dado.id;
  document.getElementById("editTitulo").value = dado.titulo;
  document.getElementById("editDescricao").value = dado.descricao;
}

async function salvarEdicao() {
  const formData = new FormData();
  formData.append("id", document.getElementById("editId").value);
  formData.append("titulo", document.getElementById("editTitulo").value);
  formData.append("descricao", document.getElementById("editDescricao").value);

  const res = await fetch("../backend/dados/editar.php", {
    method: "POST",
    body: formData
  });

  if (res.ok) {
    cancelarEdicao();
    carregarDados();
  } else {
    alert("Erro ao editar (somente admin)");
  }
}

function cancelarEdicao() {
  document.getElementById("editArea").style.display = "none";
}

console.log("dashboard.js carregado");