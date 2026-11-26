<?php
/*
 * DoaTEC — usuarios/processar_usuario.php
 * Dono: Pessoa 1 · Tipo: recebe os formulários da pasta usuarios
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
 *    Regras do DoaTEC: PHP procedural (sem classe, objeto ou PDO); sem SQL
 *    neste arquivo; ele só recebe o formulário, verifica a permissão,
 *    chama as funções de usuarios/funcoes.php e redireciona.
 *
 *    Escreva usuarios/processar_usuario.php:
 *    require __DIR__ . '/../includes/iniciar.php';
 *    $acao = $_POST['acao'] ?? $_GET['acao'] ?? '';
 *    switch ($acao):
 *    - 'login' (POST): fazer_login(email, senha). Certo -> ir_para(
 *      'index.php'). Errado -> mensagem('E-mail ou senha inválidos.',
 *      'danger') e ir_para('usuarios/login.php').
 *    - 'cadastro' (POST): cadastrar_usuario(...). 'ok' -> mensagem de
 *      sucesso e login.php; erro -> mensagem de erro e cadastro.php.
 *      Ignore qualquer campo "perfil" enviado.
 *    - 'senha' (POST): exigir_perfil('DOADOR', 'ORGANIZADOR', 'ADMIN');
 *      trocar_senha(usuario_id(), ...). O id vem sempre da sessão.
 *    - 'perfil' (POST): exigir_perfil('ADMIN'); mudar_perfil(id_usuario,
 *      perfil); volta para perfis.php.
 *    - 'sair' (GET): sair(); ir_para('index.php').
 *    - qualquer outro: ir_para('index.php').
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Um processar só para a pasta inteira, escolhendo pelo campo acao.
 *    exigir_perfil aqui é o que impede alguém de se promover a admin
 *    mandando o formulário direto.
 *
 * 3) #ToDo
 *    [ ] switch com as 5 ações
 *    [ ] exigir_perfil em senha e perfil
 *    [ ] testar: doador enviando acao=perfil recebe 403
 */
