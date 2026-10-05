<?php
require '_auth.php';
require '../config/conexao.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("DELETE FROM projetos WHERE id = ?");
$stmt->execute([$id]);

header('Location: projetos.php');
exit;
