<?php
/*
 * DoaTEC — usuarios/senha.php
 * Dono: Pessoa 1 · Tipo: página · Acesso: qualquer usuário logado
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
 *    Escreva usuarios/senha.php:
 *    require __DIR__ . '/../includes/iniciar.php';
 *    exigir_perfil('DOADOR', 'ORGANIZADOR', 'ADMIN');
 *    header.php, formulário POST para processar_usuario.php com hidden
 *    acao=senha, senha atual, nova senha e confirmação (minlength 6),
 *    botão "Alterar senha", botao_link('Voltar', 'index.php'), footer.php.
 *
 * 2) CONTEXTO
 *    O admin inicial entra com a senha do README e troca aqui no primeiro
 *    acesso. Esse passo aparece no manual.
 *
 * 3) #ToDo
 *    [ ] formulário de troca de senha
 *    [ ] print para o manual (primeiro acesso)
 */
