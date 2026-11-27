<?php
/*
 * DoaTEC — organizador/repository.php
 * Dono: Pessoa 4 · Tipo: consultas SQL (só SQL, sem regra)
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
 *    Banco (confira no database/doatec.sql):
 *    tb_doacoes(id_doacao, id_usuario, id_item, qtd_prometida,
 *      qtd_recebida, status_doacao, dt_intencao, dt_recebimento,
 *      id_recebedor, dt_cancelamento)
 *    tb_campanhas(... img_campanha ...)
 *    view vw_arrecadacao_item(id_item, id_campanha, nome_item, meta_item,
 *      qtd_arrecadada, qtd_a_caminho, qtd_faltante)
 *
 *    Escreva organizador/repository.php com:
 *    - repo_total_por_item($id_campanha, $order_by): SELECT * FROM
 *      vw_arrecadacao_item WHERE id_campanha = ? ORDER BY $order_by
 *      ($order_by já chega validado por lista branca).
 *    - repo_pendentes($id_campanha): doações PENDENTE da campanha com nome
 *      do doador e do item (JOIN tb_usuarios e tb_itens), mais antigas
 *      primeiro.
 *    - repo_confirmar_doacao($id_doacao, $qtd, $id_recebedor): UPDATE
 *      tb_doacoes SET status_doacao = 'RECEBIDA', qtd_recebida = ?,
 *      dt_recebimento = NOW(), id_recebedor = ? WHERE id_doacao = ? AND
 *      status_doacao = 'PENDENTE'. Devolve true se affected_rows for 1.
 *    - repo_campanha_imagem($id_campanha, $nome_ou_null): UPDATE
 *      tb_campanhas SET img_campanha = ? WHERE id_campanha = ?.
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    repo_total_por_item é a ÚNICA consulta de total do sistema: index,
 *    painel do doador, painel do organizador e relatório usam ela. O
 *    "AND status_doacao = 'PENDENTE'" faz o segundo clique em confirmar
 *    não mudar nada.
 *
 * 3) #ToDo
 *    [ ] conferir nomes quando o doatec.sql existir (a view é da P2)
 *    [ ] total por item
 *    [ ] pendentes
 *    [ ] confirmar com WHERE PENDENTE
 *    [ ] atualizar imagem
 */
