<?php
/*
 * DoaTEC — includes/painel.php
 * Dono: Pessoa 3 (visual) · PRONTO · incluído só pelo index.php
 *
 * PAINEL ÚNICO: a mesma tela para todo mundo. O que muda é o perfil:
 *
 *   ┌───────────────────────────┬──────────────────────────────────────┐
 *   │ Campanha (igual p/ todos) │ O que a campanha precisa             │
 *   │ imagem, status, local,    │ item · meta · recebido · falta · %   │
 *   │ horário                   │ (igual p/ todos, vem de              │
 *   │ [botões do perfil]        │  total_por_item)                     │
 *   └───────────────────────────┴──────────────────────────────────────┘
 *   Seção do perfil (cada uma na pasta do seu dono):
 *     visitante    -> nada (só os botões Entrar / Cadastrar)
 *     DOADOR       -> doador/secao_painel.php       (Pessoa 3)
 *     ORGANIZADOR  -> organizador/secao_painel.php  (Pessoa 4)
 *     ADMIN        -> admin/secao_painel.php        (Pessoa 2)
 *                     + organizador/secao_painel.php (admin também confirma)
 *
 * As seções recebem pronta a variável $campanha (array ou null).
 *
 * #ToDo
 *    [ ] tirar os function_exists quando campanha_atual (P2) e
 *        total_por_item (P4) estiverem prontas
 *    [ ] ajustar o visual ao Figma
 */

$perfil   = usuario_logado()['perfil_usuario'] ?? null;

// Enquanto a P2 e a P4 não terminam as funções, o painel abre sem quebrar.
$campanha = function_exists('campanha_atual') ? campanha_atual() : null;
$itens    = ($campanha && function_exists('total_por_item'))
    ? total_por_item($campanha['id_campanha'], 'falta')
    : [];

// Botões de ação: a única coisa do bloco comum que muda por perfil.
$botoes = [];
if ($perfil === null) {
    $botoes[] = botao_link('Entrar para doar', 'usuarios/login.php');
    $botoes[] = botao_link('Criar conta', 'usuarios/cadastro.php', 'outline-primary');
} elseif ($perfil === 'DOADOR') {
    if ($campanha && $campanha['status_campanha'] === 'ATIVA') {
        $botoes[] = botao_link('Quero doar', 'doador/doar.php', 'success');
    }
} else { // ORGANIZADOR e ADMIN
    $botoes[] = botao_link('Relatório de arrecadação', 'organizador/relatorio.php', 'outline-primary');
    if ($perfil === 'ADMIN') {
        $botoes[] = botao_link('Nova campanha', 'admin/campanha.php');
        if ($campanha) {
            $botoes[] = botao_link('Itens e metas', 'admin/itens.php?id_campanha=' . (int) $campanha['id_campanha'], 'outline-primary');
        }
        $botoes[] = botao_link('Usuários e perfis', 'usuarios/perfis.php', 'outline-secondary');
    }
}
?>

<?php if (!$campanha): ?>
    <?= aviso_vazio('Nenhuma campanha no momento.') ?>
    <div class="d-flex flex-wrap gap-2 mb-4"><?= implode(' ', $botoes) ?></div>
<?php else: ?>
    <div class="row g-4 mb-4">
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <?= imagem_campanha($campanha['img_campanha']) ?>
                    <h1 class="h4 mt-3">
                        <?= e($campanha['titulo_campanha']) ?>
                        <?= badge_status($campanha['status_campanha']) ?>
                    </h1>
                    <p class="text-muted"><?= e($campanha['descricao_campanha']) ?></p>
                    <p class="mb-1"><strong>Onde entregar:</strong> <?= e($campanha['local_entrega']) ?></p>
                    <p><strong>Horário:</strong> <?= e($campanha['horario_entrega']) ?></p>
                    <div class="d-flex flex-wrap gap-2"><?= implode(' ', $botoes) ?></div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="h5">O que a campanha precisa</h2>
                    <?php if (!$itens): ?>
                        <?= aviso_vazio('Nenhum item cadastrado ainda.') ?>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr><th>Item</th><th>Meta</th><th>Recebido</th><th>Falta</th><th style="width: 30%">Progresso</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($itens as $item): ?>
                                        <tr>
                                            <td><?= e($item['nome_item']) ?></td>
                                            <td><?= (int) $item['meta_item'] ?></td>
                                            <td><?= (int) $item['qtd_arrecadada'] ?></td>
                                            <td><?= (int) $item['qtd_faltante'] ?></td>
                                            <td><?= barra_progresso($item['qtd_arrecadada'], $item['meta_item']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
// Seção específica do perfil (cada arquivo é de uma pessoa).
if ($perfil === 'DOADOR') {
    require __DIR__ . '/../doador/secao_painel.php';
} elseif ($perfil === 'ORGANIZADOR') {
    require __DIR__ . '/../organizador/secao_painel.php';
} elseif ($perfil === 'ADMIN') {
    require __DIR__ . '/../admin/secao_painel.php';
    require __DIR__ . '/../organizador/secao_painel.php';
}
