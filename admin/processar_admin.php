<?php
/*
 * DoaTEC — admin/processar_admin.php
 * Dono: Pessoa 2 · Tipo: recebe os formulários da pasta admin · Acesso: ADMIN
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
 *    recebe o formulário, verifica a permissão, chama admin/funcoes.php e
 *    redireciona.
 *
 *    Escreva admin/processar_admin.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('ADMIN');
 *    switch ($_POST['acao'] ?? ''):
 *    - 'salvar_campanha': salvar_campanha([...], id_campanha ou null);
 *      volta para index.php.
 *    - 'status': mudar_status_campanha(id_campanha, status); volta para o
 *      painel com "Arrecadação pausada." ou "Arrecadação reaberta.".
 *    - 'salvar_item': salvar_item(...); volta para
 *      admin/itens.php?id_campanha=X.
 *    - 'remover_item': remover_item(id_item); volta para itens.php.
 *    Converta ids e meta com (int). Mostre o retorno com mensagem() (verde
 *    se 'ok', vermelho se erro) e use ir_para().
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Um processar para a pasta inteira, escolhendo pelo campo acao.
 *
 * 3) #ToDo
 *    [ ] switch com as 4 ações
 *    [ ] testar: organizador enviando este formulário recebe 403
 */
