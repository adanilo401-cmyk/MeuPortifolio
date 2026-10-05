<?php
require '_auth.php';
require '../config/conexao.php';
$projetos = $pdo->query("SELECT COUNT(*) FROM projetos")->fetchColumn();
$contatos = $pdo->query("SELECT COUNT(*) FROM contatos")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php include '../includes/head.php'; ?><title>MeuPortifolio | Painel</title></head>
<body>
<?php include '../includes/navbar.php'; ?>
<main class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="titulo-secao">PAINEL</p>
                <h1 class="fw-bold">Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>!</h1>
            </div>
            <a href="logout.php" class="btn btn-outline-danger">Sair</a>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4">
                    <p class="text-secondary">Projetos</p>
                    <h2 class="display-5 fw-bold"><?= $projetos ?></h2>
                    <a href="projetos.php" class="btn btn-primary">Gerenciar projetos</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4">
                    <p class="text-secondary">Mensagens</p>
                    <h2 class="display-5 fw-bold"><?= $contatos ?></h2>
                    <a href="contatos.php" class="btn btn-outline-primary">Ver mensagens</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>