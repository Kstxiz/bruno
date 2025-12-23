<?php
require "../auth/verifica_login.php";
require "../utils/verifica_admin.php";
require "../config/db.php";

$id = $_POST['id'];

$sql = "DELETE FROM dados WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

echo json_encode(["status" => "excluído"]);
