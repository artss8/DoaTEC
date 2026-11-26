<?php
/*
 * DoaTEC — usuarios/perfis.php
 * Dono: Pessoa 1 · Tipo: página (relatório de usuários) · Acesso: ADMIN
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
 *    Escreva usuarios/perfis.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('ADMIN');
 *    $ordem = $_GET['ordem'] ?? 'nome'; $usuarios = listar_usuarios($ordem);
 *    header.php, título "Usuários e perfis", tabela com Nome, E-mail,
 *    Perfil e Cadastro, cujos títulos usam link_ordenar(...) para nome,
 *    email, perfil e data. Em cada linha, um formulário POST para
 *    processar_usuario.php com hidden acao=perfil e id_usuario, um select
 *    DOADOR/ORGANIZADOR/ADMIN (atual selecionado) e botão Salvar; na
 *    linha do próprio admin, sem formulário. botao_link('Voltar',
 *    'index.php'). footer.php.
 *
 * 2) CONTEXTO
 *    É aqui que alguém vira Organizador ou Admin. Também é o relatório
 *    ordenável da tabela de usuários.
 *
 * 3) #ToDo
 *    [ ] tabela ordenável
 *    [ ] troca de perfil por linha
 *    [ ] print para o manual
 */
