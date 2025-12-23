<?php
require __DIR__ . "/../config/db.php";
require __DIR__ . "/../auth/verifica_login.php";

header("Content-Type: application/json; charset=UTF-8");

$stmt = $pdo->query("SELECT * FROM dados");
echo json_encode($stmt->fetchAll());
