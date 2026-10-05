<?php
require '_auth.php';
require '../config/conexao.php';
$contatos = $pdo->query("SELECT * FROM contatos ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php include '../includes/head.php'; ?><title>Mensagens</title></head>
<body>
<?php include '../includes/navbar.php'; ?>
<main class="py-5"><div class="container">
<h1 class="fw-bold mb-4">Mensagens recebidas</h1>
<div class="row g-4">
<?php foreach ($contatos as $contato): ?>
<div class="col-md-6">
    <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
            <h5 class="fw-bold"><?= htmlspecialchars($contato['nome']) ?></h5>
            <p class="small text-muted"><?= htmlspecialchars($contato['email']) ?></p>
            <p><?= nl2br(htmlspecialchars($contato['mensagem'])) ?></p>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div></main>
<?php include '../includes/footer.php'; ?>
</body>
</html>