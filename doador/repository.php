<?php
/*
 * DoaTEC — doador/repository.php
 * Dono: Pessoa 3 · Tipo: consultas SQL (só SQL, sem regra)
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
 *    Regras do DoaTEC: PHP procedural (sem classe, objeto ou PDO); banco
 *    MariaDB com mysqli procedural e prepared statement; SQL só em
 *    repository.php, regra só em funcoes.php. Conexão: db(). Toda função
 *    começa com repo_ (os nomes não podem se repetir entre pastas).
 *
 *    Tabela (confira no database/doatec.sql):
 *    tb_doacoes(id_doacao, id_usuario, id_item, qtd_prometida,
 *      qtd_recebida NULL, status_doacao ENUM('PENDENTE','RECEBIDA',
 *      'CANCELADA'), dt_intencao, dt_recebimento NULL, id_recebedor NULL,
 *      dt_cancelamento NULL)
 *    Leitura: tb_itens(id_item, id_campanha, nome_item).
 *
 *    Escreva doador/repository.php com:
 *    - repo_doacao_inserir($id_usuario, $id_item, $qtd): status PENDENTE,
 *      dt_intencao NOW()
 *    - repo_doacao_cancelar($id_doacao, $id_usuario): UPDATE para
 *      CANCELADA com dt_cancelamento NOW() WHERE id_doacao = ? AND
 *      id_usuario = ? AND status_doacao = 'PENDENTE'. Devolve true se
 *      mysqli_stmt_affected_rows for 1.
 *    - repo_doacoes_do_usuario($id_usuario, $order_by): doações com o nome
 *      do item (JOIN tb_itens); $order_by já validado.
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    O WHERE do cancelamento garante, no próprio banco, que só o dono
 *    cancela e só enquanto está pendente.
 *
 * 3) #ToDo
 *    [ ] conferir nomes quando o doatec.sql existir
 *    [ ] inserir, cancelar, listar do usuário
 */
