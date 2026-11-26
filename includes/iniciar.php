<?php
/*
 * DoaTEC — includes/iniciar.php
 * Dono: Pessoa 1 · PRONTO (código compartilhado por todas as páginas)
 *
 * COMO USAR — toda PÁGINA segue este modelo:
 *
 *     <?php
 *     require __DIR__ . '/../includes/iniciar.php';   // no index.php: '/includes/iniciar.php'
 *     exigir_perfil('ADMIN');                         // quem pode abrir
 *     // ...lógica que pode redirecionar (ir_para) vem ANTES do header...
 *     $titulo_pagina = 'Painel do administrador';
 *     require __DIR__ . '/../includes/header.php';
 *     ?>
 *         ... HTML da página, usando e() e as funções de componentes.php ...
 *     <?php require __DIR__ . '/../includes/footer.php'; ?>
 *
 * Os arquivos processar_*.php fazem só o require + exigir_perfil, chamam as
 * funções e terminam com mensagem() + ir_para(). Eles não têm header/footer.
 *
 * O que este arquivo faz: carrega o config.php, liga a sessão, cria a
 * conexão db() e carrega seguranca.php, componentes.php e os arquivos
 * funcoes.php e repository.php de todas as pastas. Ninguém precisa fazer
 * outro require.
 *
 * #ToDo
 *    [ ] cada integrante copiar config.exemplo.php para config.php
 */

// 1. Configuração (senha do MySQL de cada um). Fica fora do GitHub.
if (!file_exists(__DIR__ . '/../config.php')) {
    exit('Copie config.exemplo.php para config.php e coloque a senha do seu MySQL.');
}
require_once __DIR__ . '/../config.php';

// 2. Fuso horário, erros do banco visíveis e sessão.
date_default_timezone_set('America/Sao_Paulo');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. Conexão única com o banco. Só conecta quando alguém chama db().
function db()
{
    static $con = null;
    if ($con === null) {
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_set_charset($con, 'utf8mb4');
    }
    return $con;
}

// 4. Funções usadas por todas as páginas.
require_once __DIR__ . '/seguranca.php';
require_once __DIR__ . '/componentes.php';

// 5. Funções de cada pasta (regras e SQL).
foreach (['usuarios', 'admin', 'doador', 'organizador'] as $pasta) {
    require_once __DIR__ . '/../' . $pasta . '/repository.php';
    require_once __DIR__ . '/../' . $pasta . '/funcoes.php';
}
