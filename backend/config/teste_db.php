<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "ANTES<br>";

require __DIR__ . "/db.php";

echo "DEPOIS<br>";

try {
    $sql = "SELECT NOW() AS agora";
    $stmt = $pdo->query($sql);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Conexão bem-sucedida! Hora do servidor: " . $resultado['agora'] . "<br>";
} catch (PDOException $e) {
    echo "Erro ao executar consulta: " . $e->getMessage() . "<br>";
}