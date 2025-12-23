document.getElementById("formLogin").addEventListener("submit", async e => {
  e.preventDefault();

  const formData = new FormData(e.target);

  const res = await fetch("../backend/auth/login.php", {
    method: "POST",
    body: formData
  });

  if (res.ok) {
    // LOGIN OK → REDIRECIONA
    window.location.href = "dashboard.html";
  } else {
    const data = await res.json();
    alert(data.erro || "Erro ao fazer login");
  }
});

console.log("login.js carregado");