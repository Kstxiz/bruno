<?php
require "../auth/verifica_login.php";
require "../utils/verifica_admin.php";
require "../config/db.php";

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$sql = "UPDATE dados SET titulo = ?, descricao = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titulo, $descricao, $id]);

echo json_encode(["status" => "atualizado"]);
