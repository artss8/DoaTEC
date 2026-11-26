<?php
/*
 * DoaTEC — doador/doar.php
 * Dono: Pessoa 3 · Tipo: página (registrar doação) · Acesso: DOADOR
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
 *    Escreva doador/doar.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('DOADOR');
 *    $campanha = campanha_atual(); se não existir ou não estiver ATIVA:
 *    mensagem('A arrecadação está pausada.', 'warning') e
 *    ir_para('index.php').
 *    header.php, formulário POST para processar_doador.php com hidden
 *    acao=registrar, select de item (repo_itens_da_campanha), quantidade
 *    (number, min 1) e o texto "Leve até {local} — {horário}. Sua doação
 *    só entra no total quando o organizador confirmar o recebimento."
 *    Botão Registrar e botao_link('Voltar', 'index.php'). footer.php.
 *
 * 2) CONTEXTO
 *    Uma doação = um item. Quem quer doar cobertores e meias registra duas.
 *
 * 3) #ToDo
 *    [ ] bloquear com campanha pausada
 *    [ ] formulário com item e quantidade
 *    [ ] print para o manual
 */
