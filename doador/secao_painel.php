<?php
/*
 * DoaTEC — doador/secao_painel.php
 * Dono: Pessoa 3 · Tipo: seção do painel (incluída por includes/painel.php)
 * Aparece para: DOADOR
 *
 * 1) PROMPT PARA IA
 *    VISUAL (paleta do Figma, igual para todo o grupo): cores e fonte vêm
 *    SÓ de assets/css/estilo.css. Nunca escreva cor nas páginas (nada de
 *    hex, rgb ou style="color:..."). Use: btn-primary (verde #1B4A40),
 *    btn-outline-primary, bg-primary, text-primary, .rotulo (laranja forte
 *    #D9772B, caixa alta), .text-destaque (laranja #F2A469), .painel-verde,
 *    .titulo-grande, .card (branco) e as funções de includes/componentes.php.
 *    Fundo creme #F5F3EE, texto #1F2B28, texto suave text-secondary
 *    (#5E6B66), fonte DM Sans. Se faltar alguma classe, peça à Pessoa 3.
 *    Regras do DoaTEC: PHP procedural; este arquivo só tem HTML e pequenos
 *    trechos PHP; todo texto com e(); Bootstrap 5 e as funções de
 *    includes/componentes.php. NÃO inclua header, footer nem iniciar: o
 *    painel já fez isso. A variável $campanha já existe.
 *
 *    Escreva doador/secao_painel.php. Primeira linha:
 *        defined('BASE_URL') or exit;   (bloqueia abrir pela URL)
 *    Depois, um card "Minhas doações" com a tabela de
 *    minhas_doacoes(usuario_id(), $_GET['ordem'] ?? 'data'): títulos com
 *    link_ordenar (data, item, status), item, prometido, recebido (ou "—"),
 *    badge_status() e data. Nas PENDENTE: botao_acao('Cancelar',
 *    'doador/processar_doador.php', ['acao' => 'cancelar', 'id_doacao' =>
 *    ...], 'danger', 'Cancelar esta doação?'). Lista vazia: aviso_vazio(
 *    'Você ainda não registrou doações.').
 *
 * 2) CONTEXTO
 *    O bloco da campanha e o "Quero doar" já estão no painel único. Aqui
 *    fica só o que é do doador: acompanhar e cancelar as próprias doações.
 *
 * 3) #ToDo
 *    [ ] card Minhas doações ordenável
 *    [ ] botão Cancelar nas pendentes
 *    [ ] print para o manual
 */
