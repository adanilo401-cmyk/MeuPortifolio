<?php
require '_auth.php';
require '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO projetos (titulo, descricao, tecnologias, imagem, link_github, link_demo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        trim($_POST['titulo']),
        trim($_POST['descricao']),
        trim($_POST['tecnologias']),
        trim($_POST['imagem']),
        trim($_POST['link_github']),
        trim($_POST['link_demo'])
    ]);
    header('Location: projetos.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><?php include '../includes/head.php'; ?><title>Adicionar Projeto</title></head>
<body>
<?php include '../includes/navbar.php'; ?>
<main class="py-5"><div class="container">
<h1 class="fw-bold mb-4">Adicionar projeto</h1>
<form method="post" class="card border-0 shadow-sm p-4">
    <div class="mb-3"><label class="form-label">Título</label><input name="titulo" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Descrição</label><textarea name="descricao" class="form-control" rows="5" required></textarea></div>
    <div class="mb-3"><label class="form-label">Tecnologias</label><input name="tecnologias" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Imagem (URL)</label><input name="imagem" class="form-control"></div>
    <div class="mb-3"><label class="form-label">GitHub</label><input name="link_github" class="form-control"></div>
    <div class="mb-4"><label class="form-label">Demo</label><input name="link_demo" class="form-control"></div>
    <button class="btn btn-primary">Salvar</button>
</form>
</div></main>
<?php include '../includes/footer.php'; ?>
</body>
</html>