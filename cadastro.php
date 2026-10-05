<?php
require_once 'config/conexao.php';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if ($nome && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($senha) >= 6) {
        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT)]);
            $mensagem = 'Usuário criado com sucesso. Agora faça login.';
        } catch (PDOException $e) {
            $mensagem = 'Este e-mail já está cadastrado.';
        }
    } else {
        $mensagem = 'Preencha os campos corretamente. A senha deve ter pelo menos 6 caracteres.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>MeuPortifolio | Cadastro</title>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-sm p-4">
                    <h1 class="h3 fw-bold mb-4">Criar usuário</h1>

                    <?php if ($mensagem): ?>
                        <div class="alert alert-info"><?= htmlspecialchars($mensagem) ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" minlength="6" required>
                        </div>
                        <button class="btn btn-primary w-100">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
