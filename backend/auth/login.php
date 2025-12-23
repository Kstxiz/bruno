<?php
session_start();
require "../config/db.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['perfil'] = $usuario['perfil'];

    http_response_code(200);
    echo json_encode([
      "status" => "ok",
      "perfil" => $usuario['perfil']
    ]);
} else {
    http_response_code(401);
    echo json_encode(["erro" => "Login inválido"]);
}
