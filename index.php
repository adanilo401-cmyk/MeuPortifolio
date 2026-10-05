<?php
require_once 'config/conexao.php';
$projetos = $pdo->query("SELECT * FROM projetos ORDER BY id DESC LIMIT 3")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>MeuPortifolio | Início</title>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<header class="hero py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="text-primary fw-bold mb-2">MEUPORTIFOLIO</p>
                <h1 class="display-4 fw-bold">
                    Olá, eu sou <span class="text-primary">Wagner</span>.
                </h1>
                <p class="lead text-secondary mt-3">
                    Desenvolvedor em formação, criando projetos para a Web e aprendendo novas tecnologias.
                </p>
                <a href="projetos.php" class="btn btn-primary btn-lg mt-3">
                    Ver meus projetos
                </a>
                <a href="contato.php" class="btn btn-outline-dark btn-lg mt-3 ms-2">
                    Contato
                </a>
            </div>

            <div class="col-lg-5 text-center">
                <div class="foto-perfil">
                    <img src="https://www.remessaonline.com.br/blog/wp-content/uploads/2021/07/full-stack.jpg" alt="Minha foto">
                </div>
            </div>
        </div>
    </div>
</header>

<section id="sobre" class="py-5">
    <div class="container">
        <p class="titulo-secao">SOBRE MIM</p>
        <h2 class="fw-bold">Minha trajetória</h2>

        <div class="row mt-4">
            <div class="col-lg-8">
                <p class="text-secondary">
                    Sou estudante da área de tecnologia e este espaço foi criado para apresentar
                    meus projetos, minhas habilidades e minha evolução como desenvolvedor.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="habilidades" class="py-5 bg-light">
    <div class="container">
        <p class="titulo-secao">HABILIDADES</p>
        <h2 class="fw-bold mb-4">Tecnologias</h2>

        <div class="row g-3">
            <?php foreach (['HTML5','CSS3','Bootstrap','JavaScript','PHP','MySQL'] as $habilidade): ?>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body fw-semibold">
                            <?= htmlspecialchars($habilidade) ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">

        <p class="titulo-secao">PORTFÓLIO</p>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Projetos</h2>

            <a href="projetos.php" class="btn btn-outline-primary">
                Ver todos
            </a>
        </div>

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

                        <div class="card-body">

                            <h5 class="fw-bold">
                                <?= htmlspecialchars($projeto['titulo']) ?>
                            </h5>

                            <p class="text-secondary">
                                <?= htmlspecialchars($projeto['descricao']) ?>
                            </p>

                            <small class="text-muted">
                                <?= htmlspecialchars($projeto['tecnologias']) ?>
                            </small>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>