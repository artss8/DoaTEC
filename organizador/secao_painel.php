<?php
/*
 * DoaTEC — organizador/secao_painel.php
 * Dono: Pessoa 4 · Tipo: seção do painel (incluída por includes/painel.php)
 * Aparece para: ORGANIZADOR e ADMIN
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
 *    painel já fez isso. A variável $campanha já existe (pode ser null).
 *
 *    Escreva organizador/secao_painel.php. Primeira linha:
 *        defined('BASE_URL') or exit;   (bloqueia abrir pela URL)
 *    Se $campanha for null, não mostre nada. Senão, dois cards:
 *    1. "Entregas aguardando confirmação": tabela de
 *       pendentes($campanha['id_campanha']) com doador, item, prometido e
 *       data; em cada linha um formulário POST para
 *       organizador/processar_organizador.php com hidden acao=confirmar e
 *       id_doacao, campo qtd_recebida (number, min 1, já preenchido com o
 *       prometido) e botão "Confirmar recebimento". Vazio: aviso_vazio().
 *    2. "Imagem da campanha": formulário POST com
 *       enctype="multipart/form-data", hidden acao=enviar_imagem e
 *       id_campanha, <input type="file" name="imagem" accept="image/*"> e
 *       botão "Enviar" (ou "Substituir" se já houver imagem); se houver,
 *       botao_acao('Remover imagem', 'organizador/processar_organizador.php',
 *       ['acao' => 'remover_imagem', 'id_campanha' => ...], 'danger',
 *       'Remover a imagem?'). A imagem em si já aparece no bloco da
 *       campanha do painel.
 *
 * 2) CONTEXTO
 *    O organizador pode mudar a quantidade: prometeu 3 e entregou 2, ele
 *    digita 2. Só esse número entra no total. O admin também vê esta seção.
 *
 * 3) #ToDo
 *    [ ] card de pendências com confirmar
 *    [ ] card da imagem (enviar, substituir, remover)
 *    [ ] print para o manual
 */
