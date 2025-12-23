document.getElementById("formCadastro").addEventListener("submit", async e => {
  e.preventDefault();

  const formData = new FormData(e.target);

  const res = await fetch("../backend/auth/cadastro.php", {
    method: "POST",
    body: formData
  });

  const data = await res.json();

  if (res.ok) {
    alert("Conta criada com sucesso");
    window.location.href = "index.html";
  } else {
    alert(data.erro);
  }
});
