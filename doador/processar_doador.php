<?php
/*
 * DoaTEC — doador/processar_doador.php
 * Dono: Pessoa 3 · Tipo: recebe os formulários da pasta doador · Acesso: DOADOR
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
 *    Regras do DoaTEC: PHP procedural; sem SQL neste arquivo; ele só
 *    recebe o formulário, verifica a permissão, chama doador/funcoes.php e
 *    redireciona.
 *
 *    Escreva doador/processar_doador.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('DOADOR');
 *    switch ($_POST['acao'] ?? ''):
 *    - 'registrar': registrar_doacao(usuario_id(), (int) id_item, (int)
 *      quantidade). 'ok' -> "Doação registrada! Leve até o local de
 *      entrega." e ir_para('index.php'); erro -> mensagem e
 *      ir_para('doador/doar.php').
 *    - 'cancelar': cancelar_doacao((int) id_doacao, usuario_id()); volta
 *      para o painel.
 *    O id do doador vem SEMPRE da sessão (usuario_id()), nunca do
 *    formulário. Comente em português.
 *
 * 2) CONTEXTO
 *    Pegar o id da sessão impede alguém de doar ou cancelar em nome de
 *    outra pessoa trocando o id no formulário.
 *
 * 3) #ToDo
 *    [ ] ações registrar e cancelar
 *    [ ] testar cancelar doação de outro usuário
 */
