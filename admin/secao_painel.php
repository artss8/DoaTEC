<?php
/*
 * DoaTEC — admin/secao_painel.php
 * Dono: Pessoa 2 · Tipo: seção do painel (incluída por includes/painel.php)
 * Aparece para: ADMIN
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
 *    painel já fez isso.
 *
 *    Escreva admin/secao_painel.php. Primeira linha:
 *        defined('BASE_URL') or exit;   (bloqueia abrir pela URL)
 *    Um card "Campanhas" com a tabela de listar_campanhas($_GET['ordem'] ??
 *    'inicio'): títulos com link_ordenar (titulo, inicio, status), título,
 *    período, badge_status() e, por linha: botao_link('Editar',
 *    'admin/campanha.php?id=' . id), botao_link('Itens e metas',
 *    'admin/itens.php?id_campanha=' . id) e botao_acao('Pausar' ou
 *    'Reabrir', 'admin/processar_admin.php', ['acao' => 'status',
 *    'id_campanha' => id, 'status' => 'PAUSADA' ou 'ATIVA'], 'warning').
 *    Lista vazia: aviso_vazio('Nenhuma campanha cadastrada.').
 *
 * 2) CONTEXTO
 *    Os atalhos do admin (Nova campanha, Usuários e perfis, Relatório) já
 *    estão nos botões do painel único. Aqui fica a gestão das campanhas.
 *    Abaixo desta seção o admin também vê a do organizador.
 *
 * 3) #ToDo
 *    [ ] tabela de campanhas ordenável
 *    [ ] Editar, Itens e metas, Pausar/Reabrir
 *    [ ] print para o manual
 */
