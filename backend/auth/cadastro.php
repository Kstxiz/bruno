<?php
require "../config/db.php";

$nome  = $_POST['nome']  ?? null;
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

if (!$nome || !$email || !$senha) {
    http_response_code(400);
    echo json_encode(["erro" => "Dados obrigatórios ausentes"]);
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Força o perfil USER
$perfil = "USER";

$sql = "INSERT INTO usuarios (nome, email, senha, perfil)
        VALUES (?, ?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senhaHash, $perfil]);

    echo json_encode(["status" => "Conta criada com sucesso"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "E-mail já cadastrado"]);
}
