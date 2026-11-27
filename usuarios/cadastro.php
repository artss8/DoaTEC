<?php
/*
 * DoaTEC — usuarios/cadastro.php
 * Dono: Pessoa 1 · Tipo: página · Acesso: visitante
 *
 * 1) PROMPT PARA IA
 *    VISUAL (paleta do Figma, igual para todo o grupo): cores e fonte vêm
 *    SÓ de assets/css/style.css. Nunca escreva cor nas páginas (nada de
 *    hex, rgb ou style="color:..."). Use: btn-primary (verde #1B4A40),
 *    btn-outline-primary, bg-primary, text-primary, .rotulo (laranja forte
 *    #D9772B, caixa alta), .text-destaque (laranja #F2A469), .painel-verde,
 *    .titulo-grande, .card (branco) e as funções de includes/componentes.php.
 *    Fundo creme #F5F3EE, texto #1F2B28, texto suave text-secondary
 *    (#5E6B66), fonte DM Sans. Se faltar alguma classe, peça à Pessoa 3.
 *    Regras do DoaTEC: PHP procedural; página só com HTML e pequenos
 *    trechos PHP; Bootstrap 5 e as funções de includes/componentes.php.
 *
 *    Escreva usuarios/cadastro.php:
 *    require __DIR__ . '/../includes/iniciar.php'; se usuario_logado(),
 *    ir_para('index.php'). Inclua header.php e um formulário POST para
 *    processar_usuario.php com hidden acao=cadastro, nome (maxlength 100),
 *    e-mail (type=email), senha e confirmação (minlength 6), todos
 *    required. NÃO coloque campo de cargo/perfil. Texto pequeno: "Toda
 *    conta nova é de doador." Link "Já tenho conta" para login.php. Footer.
 *
 * 2) CONTEXTO
 *    Se o cadastro deixasse escolher Administrador, qualquer pessoa viraria
 *    admin. Por isso todo cadastro cria Doador e o admin promove depois.
 *
 * 3) #ToDo
 *    [ ] formulário sem campo de perfil
 *    [ ] print para o manual
 */
