<?php
/*
 * DoaTEC — includes/componentes.php
 * Dono: Pessoa 3 · PRONTO (carregado pelo iniciar.php)
 *
 * Peças visuais que se repetem nas páginas. Cada função DEVOLVE o HTML;
 * na página, use echo:
 *    <?= botao_link('Quero doar', 'doador/doar.php') ?>
 *
 *    botao_link($texto, $url, $cor)                       link com cara de botão
 *    botao_acao($texto, $url, $campos, $cor, $confirmar)  botão que envia POST
 *    imagem_campanha($arquivo)                            imagem ou "Sem imagem"
 *    badge_status($status)                                PENDENTE, RECEBIDA...
 *    barra_progresso($recebido, $meta)                    barra com a %
 *    aviso_vazio($texto)                                  lista vazia
 *    link_ordenar($texto, $ordem, $ordem_atual)           título de coluna ordenável
 *
 * Cores ($cor): primary, secondary, success, danger, warning,
 * outline-primary... (as do Bootstrap 5).
 *
 * #ToDo
 *    [ ] ajustar classes e cores conforme o Figma (junto com estilo.css)
 *    [ ] criar aqui qualquer peça nova que aparecer em 2 páginas ou mais
 */

// Link com aparência de botão. $url a partir da raiz: 'admin/itens.php?id_campanha=3'
function botao_link($texto, $url, $cor = 'primary')
{
    return '<a class="btn btn-' . e($cor) . '" href="' . e(BASE_URL . '/' . ltrim($url, '/')) . '">'
        . e($texto) . '</a>';
}

// Botão que envia um formulário POST com campos escondidos.
// Ex.: botao_acao('Cancelar', 'doador/processar_doador.php',
//                 ['acao' => 'cancelar', 'id_doacao' => 7], 'danger', 'Cancelar esta doação?')
function botao_acao($texto, $url, $campos = [], $cor = 'danger', $confirmar = '')
{
    $html = '<form method="post" class="d-inline" action="' . e(BASE_URL . '/' . ltrim($url, '/')) . '"';
    if ($confirmar !== '') {
        $html .= ' data-confirmar="' . e($confirmar) . '"';
    }
    $html .= '>';
    foreach ($campos as $nome => $valor) {
        $html .= '<input type="hidden" name="' . e($nome) . '" value="' . e($valor) . '">';
    }
    $html .= '<button type="submit" class="btn btn-sm btn-' . e($cor) . '">' . e($texto) . '</button></form>';
    return $html;
}

// Imagem da campanha; sem arquivo, mostra um quadro "Sem imagem".
function imagem_campanha($arquivo)
{
    if (empty($arquivo)) {
        return '<div class="img-campanha img-campanha-vazia">Sem imagem</div>';
    }
    return '<img class="img-campanha" src="' . e(UPLOAD_URL . rawurlencode(basename($arquivo))) . '" alt="Imagem da campanha">';
}

// Etiqueta colorida para status de doação e de campanha.
function badge_status($status)
{
    $cores = [
        'PENDENTE'  => 'warning',
        'RECEBIDA'  => 'success',
        'CANCELADA' => 'secondary',
        'ATIVA'     => 'success',
        'PAUSADA'   => 'warning',
        'ENCERRADA' => 'dark',
    ];
    $cor = $cores[$status] ?? 'secondary';
    return '<span class="badge text-bg-' . $cor . ' status-' . e(strtolower($status)) . '">' . e($status) . '</span>';
}

// Barra de progresso: recebido em relação à meta, no máximo 100%.
function barra_progresso($recebido, $meta)
{
    $pct = $meta > 0 ? (int) min(100, round($recebido / $meta * 100)) : 0;
    return '<div class="progress" role="progressbar" aria-valuenow="' . $pct . '" aria-valuemin="0" aria-valuemax="100">'
        . '<div class="progress-bar" style="width: ' . $pct . '%">' . $pct . '%</div></div>';
}

// Aviso para quando uma lista não tem nada.
function aviso_vazio($texto)
{
    return '<div class="alert alert-light border text-center">' . e($texto) . '</div>';
}

// Link para ordenar uma tabela. Mantém os outros parâmetros da URL (ex.: id_campanha).
function link_ordenar($texto, $ordem, $ordem_atual)
{
    $params = $_GET;
    $params['ordem'] = $ordem;
    $classe = $ordem === $ordem_atual ? 'fw-bold text-decoration-underline' : 'text-decoration-none';
    return '<a class="' . $classe . '" href="?' . e(http_build_query($params)) . '">' . e($texto) . '</a>';
}
