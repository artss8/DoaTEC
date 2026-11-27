<?php
/*
 * DoaTEC — organizador/processar_organizador.php
 * Dono: Pessoa 4 · Tipo: recebe os formulários da pasta organizador
 * Acesso: ORGANIZADOR, ADMIN
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
 *    recebe o formulário, verifica a permissão, chama
 *    organizador/funcoes.php e redireciona.
 *
 *    Escreva organizador/processar_organizador.php:
 *    require __DIR__ . '/../includes/iniciar.php';
 *    exigir_perfil('ORGANIZADOR', 'ADMIN');
 *    switch ($_POST['acao'] ?? ''):
 *    - 'confirmar': confirmar_recebimento((int) id_doacao, (int)
 *      qtd_recebida, usuario_id()); 'ok' -> "Recebimento confirmado.".
 *    - 'enviar_imagem': salvar_imagem((int) id_campanha, $_FILES['imagem']).
 *    - 'remover_imagem': remover_imagem((int) id_campanha).
 *    Mostre o retorno com mensagem() e ir_para('index.php').
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    A regra que muda a doação NÃO fica aqui: fica em
 *    confirmar_recebimento() e no UPDATE do repository. Teste principal do
 *    projeto: doador abrindo este arquivo deve receber 403.
 *
 * 3) #ToDo
 *    [ ] ações confirmar, enviar_imagem, remover_imagem
 *    [ ] teste dos cobertores (12 -> 14, segundo clique continua 14)
 */
