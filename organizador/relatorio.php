<?php
/*
 * DoaTEC — organizador/relatorio.php
 * Dono: Pessoa 4 · Tipo: página (relatório ordenável)
 * Acesso: ORGANIZADOR, ADMIN
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
 *    Escreva organizador/relatorio.php:
 *    require __DIR__ . '/../includes/iniciar.php';
 *    exigir_perfil('ORGANIZADOR', 'ADMIN');
 *    $ordem = $_GET['ordem'] ?? 'nome';
 *    $itens = total_por_item($campanha['id_campanha'], $ordem);
 *    header.php, título "Relatório de arrecadação — {campanha}", dois
 *    link_ordenar: "Por nome" (nome) e "O que mais falta" (falta). Tabela:
 *    item, meta, recebido, a caminho, falta e barra_progresso(). Botão
 *    "Imprimir" (onclick="window.print()") e botao_link('Voltar',
 *    'index.php'). footer.php. Não some nada aqui.
 *
 * 2) CONTEXTO
 *    Atende ao requisito de relatório ordenável. Usa a mesma função das
 *    Homes, então no teste dos cobertores mostra 14 recebidos e 36
 *    faltando, igual ao painel do doador. "A caminho" são promessas: não
 *    entram no recebido.
 *
 * 3) #ToDo
 *    [ ] ordenação por nome e por falta
 *    [ ] tabela com barra de progresso
 *    [ ] conferir que bate com o painel do doador
 *    [ ] print para o manual
 */
