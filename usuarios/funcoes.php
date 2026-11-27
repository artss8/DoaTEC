<?php
/*
 * DoaTEC — usuarios/funcoes.php
 * Dono: Pessoa 1 · Tipo: regras de negócio (sem SQL)
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
 *    Regras do DoaTEC: PHP procedural (sem classe, objeto ou PDO); SQL só
 *    em repository.php, regra só em funcoes.php. Aqui NÃO tem SQL: use as
 *    funções repo_ de usuarios/repository.php e senha_hash() de
 *    includes/seguranca.php. Cada função devolve uma mensagem de texto
 *    (ou um array) para a página mostrar.
 *
 *    Escreva usuarios/funcoes.php com:
 *    - fazer_login($email, $senha): valida o e-mail (filter_var), busca o
 *      usuário e compara senha_hash($email, $senha) com hash_equals. Certo:
 *      chama entrar($usuario) e devolve true. Errado: false (a página
 *      mostra "E-mail ou senha inválidos", sem dizer qual errou).
 *    - cadastrar_usuario($nome, $email, $senha, $confirmacao): nome
 *      obrigatório até 100, e-mail válido, senha com 6+ caracteres e igual
 *      à confirmação, e-mail ainda não usado. Sempre cria DOADOR.
 *      Devolve 'ok' ou a mensagem de erro.
 *    - trocar_senha($id, $atual, $nova, $confirmacao): confere a senha
 *      atual antes de trocar.
 *    - listar_usuarios($ordem): $ordem só pode ser 'nome', 'email',
 *      'perfil' ou 'data' (lista branca convertida em ORDER BY); outro
 *      valor vira 'nome'.
 *    - mudar_perfil($id_alvo, $perfil): perfil precisa ser DOADOR,
 *      ORGANIZADOR ou ADMIN, e o admin logado não pode mudar o próprio
 *      perfil (para o sistema nunca ficar sem admin).
 *    Comente em português.
 *
 * 2) CONTEXTO
 *    O cadastro público nunca cria Organizador ou Admin: quem promove é o
 *    admin na tela perfis.php. O primeiro admin vem do doatec.sql, com a
 *    senha anotada no README.
 *
 * 3) #ToDo
 *    [ ] fazer_login
 *    [ ] cadastrar_usuario (sempre DOADOR)
 *    [ ] trocar_senha
 *    [ ] listar_usuarios com lista branca
 *    [ ] mudar_perfil sem auto-rebaixamento
 */
