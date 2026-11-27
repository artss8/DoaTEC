<?php
/*
 * DoaTEC — admin/repository.php
 * Dono: Pessoa 2 · Tipo: consultas SQL (só SQL, sem regra)
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
 *    Tabelas (confira no database/doatec.sql):
 *    tb_campanhas(id_campanha, titulo_campanha, descricao_campanha,
 *      img_campanha, local_entrega, horario_entrega, dt_inicio, dt_fim,
 *      status_campanha ENUM('ATIVA','PAUSADA','ENCERRADA'))
 *    tb_itens(id_item, id_campanha, nome_item, meta_item)
 *    tb_doacoes (só leitura aqui)
 *
 *    Escreva admin/repository.php com:
 *    - repo_campanha_atual(): a campanha mais recente que não está
 *      ENCERRADA (é a que aparece nas Homes de todo mundo)
 *    - repo_campanha_por_id($id)
 *    - repo_campanhas_listar($order_by) ($order_by já validado)
 *    - repo_campanha_inserir($dados) e repo_campanha_atualizar($id, $dados)
 *    - repo_campanha_status($id, $status)
 *    - repo_itens_da_campanha($id_campanha) (ordem por nome)
 *    - repo_item_por_id($id), repo_item_inserir(...), repo_item_atualizar(...)
 *    - repo_item_nome_existe($id_campanha, $nome, $ignorar_id)
 *    - repo_item_tem_doacoes($id_item): COUNT em tb_doacoes > 0
 *    - repo_item_remover($id)
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Só executa o SQL. As decisões (pode remover? nome repetido?) ficam em
 *    admin/funcoes.php. Pode LER tb_doacoes para saber se um item tem
 *    doações; só não grava nela.
 *
 * 3) #ToDo
 *    [ ] conferir nomes quando o doatec.sql existir
 *    [ ] funções de campanha
 *    [ ] funções de item
 */
