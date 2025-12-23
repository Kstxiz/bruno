<?php
session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'ADMIN') {
    http_response_code(403);
    exit;
}
