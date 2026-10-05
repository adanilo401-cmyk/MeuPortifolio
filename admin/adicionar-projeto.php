<?php
require_once __DIR__ . '/_auth.php';
require_once __DIR__ . '/../config/conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $tecnologias = trim($_POST['tecnologias'] ?? '');
    $imagem = trim($_POST['imagem'] ?? '');
    $github = trim($_POST['link_github'] ?? '');
    $demo = trim($_POST['link_demo'] ?? '');

    if ($titulo === '' || $descricao === '' || $tecnologias === '') {
        $erro = 'Preencha título, descrição e tecnologias.';
    } else {
        $stmt = $pdo->prepare("INSERT INTO projetos (titulo, descricao, tecnologias, imagem, link_github, link_demo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $descricao, $tecnologias, $imagem, $github, $demo]);
        header('Location: projetos.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include __DIR__ . '/../includes/head.php'; ?>
    <title>MeuPortifolio | Novo projeto</title>
</head>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="fw-bold mb-4">Adicionar projeto</h1>

                <?php if ($erro): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                <?php endif; ?>

                <form method="post" class="card border-0 shadow-sm p-4">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnologias</label>
                        <input type="text" name="tecnologias" class="form-control" placeholder="PHP, MySQL, Bootstrap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL da imagem</label>
                        <input type="url" name="imagem" class="form-control" placeholder="https://...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link GitHub</label>
                        <input type="url" name="link_github" class="form-control" placeholder="https://github.com/...">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Link da aplicação</label>
                        <input type="url" name="link_demo" class="form-control" placeholder="https://...">
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary">Salvar projeto</button>
                        <a href="projetos.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
