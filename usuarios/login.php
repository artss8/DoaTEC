<?php
/*
 * DoaTEC — usuarios/login.php
 * Dono: Pessoa 1 · Tipo: página · Acesso: visitante
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
 *    trechos PHP; Bootstrap 5 e as funções de includes/componentes.php.
 *
 *    Escreva usuarios/login.php:
 *    require __DIR__ . '/../includes/iniciar.php'; se usuario_logado(),
 *    ir_para('index.php'). $titulo_pagina = 'Entrar'; inclua header.php.
 *
 *    Layout igual ao Figma, em duas colunas (row g-0, cada uma col-lg-6;
 *    no celular a coluna verde fica escondida com d-none d-lg-flex):
 *    - Esquerda, div .painel-verde com padding grande: <p class="rotulo">
 *      "Bem-vindo ao DoaTEC"; <h1 class="titulo-grande display-3">
 *      "Doar fica mais simples quando sabemos <span class="text-destaque">
 *      onde ajudar.</span>"; parágrafo "O DoaTEC aproxima quem quer doar de
 *      quem organiza. Acompanhe necessidades reais e faça parte dessa
 *      corrente."; no fim, "Uma pequena atitude." em negrito e "Um impacto
 *      que chega longe." abaixo.
 *    - Direita, fundo creme: <p class="rotulo">"Bem-vindo ao DoaTEC";
 *      <h2 class="titulo-grande">"Entre na sua conta"; texto
 *      text-secondary "Acesse para acompanhar a arrecadação."; formulário
 *      POST para processar_usuario.php com hidden acao=login, label
 *      "E-mail" + input type=email (placeholder "seuemail@exemplo.com"),
 *      label "Senha" + input type=password (placeholder "Digite sua
 *      senha") com botão de olho que mostra/esconde a senha, botão
 *      btn-primary w-100 "Entrar →"; abaixo, "Ainda não tem conta?
 *      Cadastre-se" (link para cadastro.php).
 *    Inclua footer.php. Nenhuma cor escrita na página.
 *
 * 2) CONTEXTO
 *    Login por e-mail e senha. A conferência acontece no processar.
 *    O Figma tem também "Contas de demonstração" (Doador, Organizador,
 *    Administrador). DECISÃO DO GRUPO: se mantiverem, os botões só
 *    preenchem o e-mail (nunca a senha), e essas contas precisam ser
 *    criadas pela interface (cadastro + promoção pelo admin), porque o
 *    script do banco só cria o admin inicial.
 *
 * 3) #ToDo
 *    [ ] layout em duas colunas igual ao Figma
 *    [ ] formulário com mostrar/esconder senha
 *    [ ] decidir as contas de demonstração
 *    [ ] print para o manual
 */
