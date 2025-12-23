<?php
require "../auth/verifica_login.php";
require "../utils/verifica_admin.php";
require "../config/db.php";

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO dados (titulo, descricao) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titulo, $descricao]);

echo json_encode(["status" => "criado"]);
