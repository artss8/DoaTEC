<?php
/*
 * DoaTEC — admin/itens.php
 * Dono: Pessoa 2 · Tipo: página (itens e metas) · Acesso: ADMIN
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
 *    Regras do DoaTEC: PHP procedural; página só com HTML e pequenos
 *    trechos PHP; todo texto com e(); Bootstrap 5 e as funções de
 *    includes/componentes.php.
 *
 *    Escreva admin/itens.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('ADMIN');
 *    $id_campanha = (int) ($_GET['id_campanha'] ?? 0); carregue a campanha
 *    (se não existir, mensagem de erro e ir_para('index.php')).
 *    header.php, título "Itens e metas — {campanha}", tabela com Item e
 *    Meta e, por linha, botao_link Editar (itens.php?id_campanha=X&editar=ID)
 *    e botao_acao Remover para processar_admin.php com acao=remover_item e
 *    confirmação. Abaixo, formulário POST para processar_admin.php com
 *    hidden acao=salvar_item, id_campanha e id_item (se editando), nome do
 *    item (maxlength 80) e meta (number, min 1). footer.php.
 *
 * 2) CONTEXTO
 *    A meta é por item. É com ela que se calcula quanto falta.
 *
 * 3) #ToDo
 *    [ ] tabela com editar/remover
 *    [ ] formulário novo/editar item
 *    [ ] print para o manual
 */
