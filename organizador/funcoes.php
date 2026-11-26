<?php
/*
 * DoaTEC — organizador/funcoes.php
 * Dono: Pessoa 4 · Tipo: regras de negócio (sem SQL)
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
 *    Regras do DoaTEC: PHP procedural (sem classe, objeto ou PDO; use
 *    finfo_open/finfo_file, nunca "new finfo"); aqui NÃO tem SQL: use as
 *    funções repo_ de organizador/repository.php e repo_campanha_por_id()
 *    da pasta admin. Cada função de ação devolve 'ok' ou uma mensagem.
 *
 *    Escreva organizador/funcoes.php com:
 *    - total_por_item($id_campanha, $ordem = 'nome'): lista branca
 *      ['nome' => 'nome_item ASC', 'falta' => 'qtd_faltante DESC,
 *      nome_item ASC']; outro valor vira 'nome'.
 *    - pendentes($id_campanha): repassa repo_pendentes().
 *    - confirmar_recebimento($id_doacao, $qtd, $id_recebedor): qtd
 *      inteira >= 1. Se repo_confirmar_doacao() devolver false: "Esta
 *      doação já tinha sido processada."
 *    - salvar_imagem($id_campanha, $arquivo): $arquivo é $_FILES['imagem'].
 *      Confere erro do upload, tamanho até 2 MB, tipo REAL com
 *      finfo_file (só image/jpeg, image/png, image/webp; a extensão sai
 *      desse tipo, nunca do nome enviado), gera o nome com
 *      bin2hex(random_bytes(16)), move_uploaded_file para UPLOAD_DIR,
 *      grava com repo_campanha_imagem() e só então apaga o arquivo antigo
 *      (unlink com basename).
 *    - remover_imagem($id_campanha): grava null e apaga o arquivo.
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Regra central: só a quantidade RECEBIDA conta. Exemplo: 12 cobertores
 *    recebidos; alguém promete 3 -> continua 12; entrega 2 e o organizador
 *    confirma -> 14; segundo clique -> continua 14.
 *    A imagem da campanha cumpre o requisito de CRUD de imagens (enviar,
 *    ver, substituir, remover).
 *
 * 3) #ToDo
 *    [ ] total_por_item com lista branca (avisar a P3 quando pronta)
 *    [ ] pendentes e confirmar_recebimento
 *    [ ] salvar_imagem com validação de tipo real
 *    [ ] remover_imagem
 *    [ ] testar .php renomeado para .jpg
 */
