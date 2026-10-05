<?php
require_once 'config/conexao.php';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $mensagem = trim($_POST['mensagem']);

    if ($nome && filter_var($email, FILTER_VALIDATE_EMAIL) && $mensagem) {
        $stmt = $pdo->prepare("INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $mensagem]);
        $sucesso = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>MeuPortifolio | Contato</title>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p class="titulo-secao">CONTATO</p>
                <h1 class="fw-bold">Entre em contato</h1>
                <p class="text-secondary">Preencha o formulário abaixo para enviar uma mensagem.</p>

                <?php if ($sucesso): ?>
                    <div class="alert alert-success">Mensagem enviada com sucesso!</div>
                <?php endif; ?>

                <form method="post" class="card border-0 shadow-sm p-4 mt-4">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mensagem</label>
                        <textarea name="mensagem" class="form-control" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
