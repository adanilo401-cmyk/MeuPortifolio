<?php
require '_auth.php';
require '../config/conexao.php';
$projetos = $pdo->query("SELECT * FROM projetos ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php include '../includes/head.php'; ?><title>Gerenciar Projetos</title></head>
<body>
<?php include '../includes/navbar.php'; ?>
<main class="py-5">
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Projetos</h1>
        <a href="adicionar.php" class="btn btn-primary">+ Adicionar projeto</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead><tr><th>ID</th><th>Título</th><th>Tecnologias</th><th>Ações</th></tr></thead>
            <tbody>
            <?php foreach ($projetos as $projeto): ?>
                <tr>
                    <td><?= $projeto['id'] ?></td>
                    <td><?= htmlspecialchars($projeto['titulo']) ?></td>
                    <td><?= htmlspecialchars($projeto['tecnologias']) ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary" href="editar.php?id=<?= $projeto['id'] ?>">Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="excluir.php?id=<?= $projeto['id'] ?>" onclick="return confirm('Excluir projeto?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>