<?php
/*
 * DoaTEC — doador/funcoes.php
 * Dono: Pessoa 3 · Tipo: regras de negócio (sem SQL)
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
 *    Regras do DoaTEC: PHP procedural (sem classe, objeto ou PDO); aqui
 *    NÃO tem SQL: use as funções repo_ de doador/repository.php, e
 *    repo_item_por_id() e campanha_aberta() da pasta admin. Cada função
 *    devolve 'ok' ou uma mensagem de erro.
 *
 *    Escreva doador/funcoes.php com:
 *    - registrar_doacao($id_usuario, $id_item, $qtd): qtd inteira >= 1;
 *      o item precisa existir; campanha_aberta(id_campanha do item)
 *      precisa ser verdadeiro, senão "A arrecadação está pausada.". Só
 *      então repo_doacao_inserir().
 *    - cancelar_doacao($id_doacao, $id_usuario): chama
 *      repo_doacao_cancelar(); se não mudou nada, "Só é possível cancelar
 *      suas doações ainda pendentes."
 *    - minhas_doacoes($id_usuario, $ordem): ordem só 'data' (padrão, mais
 *      recentes primeiro), 'item' ou 'status' (lista branca).
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Registrar uma doação NÃO muda o total: só conta o que o organizador
 *    confirmar. Campanha pausada bloqueia aqui, então mesmo um POST
 *    enviado pelo DevTools é recusado.
 *
 * 3) #ToDo
 *    [ ] registrar_doacao com as validações
 *    [ ] cancelar_doacao
 *    [ ] minhas_doacoes com lista branca
 *    [ ] testar com a campanha pausada
 */
