<?php
require "../auth/verifica_login.php";
require "../utils/verifica_admin.php";
require "../config/db.php";

$sql = "SELECT id, nome, email, perfil FROM usuarios";
$stmt = $pdo->query($sql);

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($usuarios);
