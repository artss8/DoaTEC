<?php
/*
 * DoaTEC — includes/seguranca.php
 * Dono: Pessoa 1 · PRONTO (carregado pelo iniciar.php)
 *
 * Funções que todas as páginas usam:
 *    e($texto)                   imprime texto com segurança (anti-XSS)
 *    senha_hash($email, $senha)  SHA-256 com salt = e-mail (exigência do enunciado)
 *    entrar($usuario) / sair()   login e logout
 *    usuario_logado()            array do usuário da sessão, ou null
 *    usuario_id()                id do usuário logado, ou null
 *    exigir_perfil('A', 'B')     bloqueia quem não tem um desses perfis (403)
 *    mensagem($texto, $tipo)     guarda um aviso para a próxima página
 *    mostrar_mensagens()         imprime os avisos (o header.php já chama)
 *    ir_para('pasta/pagina.php') redireciona e encerra
 *
 * #ToDo
 *    [ ] perguntar ao professor se o e-mail como salt atende ao enunciado
 *    [ ] conferir que senha_hash() bate com o SHA2() do admin no doatec.sql
 */

// Escapa qualquer texto antes de imprimir na tela (prevenção de XSS).
function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

// SHA-256 com salt baseado no login. Nosso login é o e-mail.
// No SQL, o equivalente é: SHA2(CONCAT('email@exemplo.com', 'senha'), 256)
function senha_hash($email, $senha)
{
    return hash('sha256', strtolower(trim($email)) . $senha);
}

// Guarda na sessão só o necessário. Trocar o id da sessão evita sequestro.
function entrar(array $usuario)
{
    session_regenerate_id(true);
    $_SESSION['usuario'] = [
        'id_usuario'     => (int) $usuario['id_usuario'],
        'nome_usuario'   => $usuario['nome_usuario'],
        'perfil_usuario' => $usuario['perfil_usuario'],
    ];
}

// Encerra a sessão por completo.
function sair()
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
}

function usuario_logado()
{
    return $_SESSION['usuario'] ?? null;
}

function usuario_id()
{
    return isset($_SESSION['usuario']) ? (int) $_SESSION['usuario']['id_usuario'] : null;
}

// Primeira linha de toda página e de todo processar_*.php.
// Exemplo: exigir_perfil('ORGANIZADOR', 'ADMIN');
function exigir_perfil(string ...$perfis)
{
    $usuario = usuario_logado();

    if ($usuario === null) {
        mensagem('Entre para continuar.', 'warning');
        ir_para('usuarios/login.php');
    }

    if (!in_array($usuario['perfil_usuario'], $perfis, true)) {
        http_response_code(403);
        $titulo_pagina = 'Acesso negado';
        require __DIR__ . '/header.php';
        echo '<div class="alert alert-danger">Você não tem permissão para acessar esta página.</div>';
        echo botao_link('Voltar ao início', 'index.php');
        require __DIR__ . '/footer.php';
        exit;
    }
}

// Tipos: success (verde), danger (vermelho), warning (amarelo), info (azul).
function mensagem($texto, $tipo = 'success')
{
    $_SESSION['mensagens'][] = ['texto' => $texto, 'tipo' => $tipo];
}

function mostrar_mensagens()
{
    foreach ($_SESSION['mensagens'] ?? [] as $m) {
        echo '<div class="alert alert-' . e($m['tipo']) . ' alert-dismissible fade show" role="alert">'
            . e($m['texto'])
            . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>'
            . '</div>';
    }
    unset($_SESSION['mensagens']);
}

// Caminho sempre a partir da raiz do projeto: ir_para('index.php');
function ir_para($caminho)
{
    header('Location: ' . BASE_URL . '/' . ltrim($caminho, '/'));
    exit;
}
