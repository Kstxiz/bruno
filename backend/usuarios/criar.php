<?php
require "../auth/verifica_login.php";
require "../utils/verifica_admin.php";
require "../config/db.php";

$nome   = $_POST['nome']   ?? null;
$email  = $_POST['email']  ?? null;
$senha  = $_POST['senha']  ?? null;
$perfil = $_POST['perfil'] ?? 'USER';

if (!$nome || !$email || !$senha) {
    http_response_code(400);
    echo json_encode(["erro" => "Dados obrigatórios ausentes"]);
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha, perfil)
        VALUES (?, ?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senhaHash, $perfil]);

    echo json_encode(["status" => "usuário criado"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao criar usuário"]);
}
