<?php
/*
 * DoaTEC — includes/header.php
 * Dono: Pessoa 1 · PRONTO
 * Topo idêntico em todas as páginas (exigência do enunciado).
 * Antes de incluir, a página pode definir $titulo_pagina = '...';
 */
$usuario_topo = usuario_logado();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titulo_pagina) ? e($titulo_pagina) . ' — DoaTEC' : 'DoaTEC' ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= e(BASE_URL) ?>/assets/css/estilo.css">
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-md navbar-dark navbar-doatec">
    <div class="container">
        <a class="navbar-brand fw-bold logo-doatec" href="<?= e(BASE_URL) ?>/index.php">Doa<span class="tec">TEC</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-topo"
                aria-controls="menu-topo" aria-expanded="false" aria-label="Abrir menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="menu-topo">
            <ul class="navbar-nav align-items-md-center">
                <?php if ($usuario_topo): ?>
                    <li class="nav-item"><span class="navbar-text me-md-3">Olá, <?= e($usuario_topo['nome_usuario']) ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="<?= e(BASE_URL) ?>/usuarios/senha.php">Alterar senha</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= e(BASE_URL) ?>/usuarios/processar_usuario.php?acao=sair">Sair</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= e(BASE_URL) ?>/usuarios/login.php">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= e(BASE_URL) ?>/usuarios/cadastro.php">Cadastrar</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4 flex-grow-1">
    <?php mostrar_mensagens(); ?>
