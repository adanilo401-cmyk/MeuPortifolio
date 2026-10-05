<?php
require_once 'config/conexao.php';

$projetos = $pdo->query("SELECT * FROM projetos ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>MeuPortifolio | Projetos</title>
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<main class="py-5">
    <div class="container">
        <p class="titulo-secao">PORTFÓLIO</p>
        <h1 class="fw-bold">Meus projetos</h1>
        <p class="text-secondary mb-5">
            Conheça os projetos que fazem parte da minha trajetória.
        </p>
        <div class="row g-4">
            <?php if (!$projetos): ?>
                <div class="col-12">
                    <div class="alert alert-secondary">
                        Nenhum projeto cadastrado ainda.
                    </div>
                </div>
            <?php endif; ?>
            <?php foreach ($projetos as $projeto): ?>

                <div class="col-md-6 col-lg-4">
                    <div class="card projeto-card h-100">
                        <div class="projeto-imagem">
                            <?php if (!empty($projeto['imagem'])): ?>
                                <img
                                    src="<?= htmlspecialchars($projeto['imagem']) ?>"
                                    alt="<?= htmlspecialchars($projeto['titulo']) ?>"
                                    class="img-fluid w-100 h-100"
                                    style="object-fit: cover;"
                                >
                            <?php else: ?>
                                <span>
                                    <?= htmlspecialchars($projeto['titulo']) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column">

                            <h5 class="fw-bold">
                                <?= htmlspecialchars($projeto['titulo']) ?>
                            </h5>

                            <p class="text-secondary">
                                <?= nl2br(htmlspecialchars($projeto['descricao'])) ?>
                            </p>

                            <p class="small text-muted mt-auto">
                                <strong>Tecnologias:</strong>
                                <?= htmlspecialchars($projeto['tecnologias']) ?>
                            </p>
                            <div class="mt-2">
                                <?php if (!empty($projeto['link_github'])): ?>
                                    <a
                                        href="<?= htmlspecialchars($projeto['link_github']) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-dark btn-sm"
                                    >
                                        GitHub
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($projeto['link_demo'])): ?>
                                    <a
                                        href="<?= htmlspecialchars($projeto['link_demo']) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-primary btn-sm"
                                    >
                                        Demo
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>