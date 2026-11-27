<?php
/*
 * DoaTEC — usuarios/repository.php
 * Dono: Pessoa 1 · Tipo: consultas SQL (só SQL, sem regra)
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
 *    deste arquivo começa com repo_ (os nomes não podem se repetir entre
 *    pastas).
 *
 *    Tabela: tb_usuarios(id_usuario, nome_usuario, email_usuario UNIQUE,
 *    senha_hash CHAR(64), perfil_usuario ENUM('DOADOR','ORGANIZADOR',
 *    'ADMIN'), dt_cadastro). Confira os nomes no database/doatec.sql.
 *
 *    Escreva usuarios/repository.php com:
 *    - repo_usuario_por_email($email): array ou null
 *    - repo_usuario_por_id($id): array ou null
 *    - repo_usuario_inserir($nome, $email, $hash): INSERT com perfil
 *      'DOADOR' fixo
 *    - repo_usuario_trocar_senha($id, $hash)
 *    - repo_usuarios_listar($order_by): SELECT de todos sem a senha;
 *      $order_by já chega validado pelo funcoes.php
 *    - repo_usuario_trocar_perfil($id, $perfil)
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    Só executa o SQL. Quem decide (e-mail repetido, senha certa, quem pode
 *    virar admin) é o usuarios/funcoes.php.
 *
 * 3) #ToDo
 *    [ ] conferir nomes quando o doatec.sql existir
 *    [ ] as 6 funções com prepared statement
 */
