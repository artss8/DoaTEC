<?php
/*
 * DoaTEC — admin/funcoes.php
 * Dono: Pessoa 2 · Tipo: regras de negócio (sem SQL)
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
 *    NÃO tem SQL: use as funções repo_ de admin/repository.php. Cada
 *    função devolve 'ok' ou uma mensagem de erro para a página mostrar.
 *
 *    Escreva admin/funcoes.php com:
 *    - campanha_atual(): repassa repo_campanha_atual() (usada por todas as
 *      pastas).
 *    - listar_campanhas($ordem): só aceita 'titulo', 'inicio' ou 'status'
 *      (lista branca convertida em ORDER BY); padrão 'inicio'.
 *    - salvar_campanha($dados, $id = null): título obrigatório até 120,
 *      local e horário de entrega obrigatórios, datas válidas com
 *      explode('-') + checkdate() (não use DateTime, é classe), fim >=
 *      início. Insere ou atualiza.
 *    - mudar_status_campanha($id, $status): só ATIVA, PAUSADA ou ENCERRADA.
 *    - campanha_aberta($id_campanha): true só se o status for ATIVA (a
 *      Pessoa 3 usa para bloquear novas doações).
 *    - salvar_item($id_campanha, $nome, $meta, $id = null): nome até 80,
 *      meta inteira >= 1, nome não repetido na campanha.
 *    - remover_item($id): recusa com "Este item já tem doações e não pode
 *      ser removido." se repo_item_tem_doacoes() for verdadeiro.
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    A meta é por item (50 cobertores, 30 meias). Local e horário de
 *    entrega são campos da própria campanha (um ponto por campanha).
 *    campanha_atual() e campanha_aberta() são usadas pelas outras pastas.
 *
 * 3) #ToDo
 *    [ ] campanha_atual e campanha_aberta (avisar P3 e P4 quando prontas)
 *    [ ] listar_campanhas com lista branca
 *    [ ] salvar_campanha com validação de datas
 *    [ ] mudar_status_campanha
 *    [ ] salvar_item e remover_item
 */
