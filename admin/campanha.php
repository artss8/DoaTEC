<?php
/*
 * DoaTEC — admin/campanha.php
 * Dono: Pessoa 2 · Tipo: página (nova campanha / editar) · Acesso: ADMIN
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
 *    Regras do DoaTEC: PHP procedural; página só com HTML e pequenos
 *    trechos PHP; todo texto com e() (inclusive nos value); Bootstrap 5.
 *
 *    Escreva admin/campanha.php:
 *    require __DIR__ . '/../includes/iniciar.php'; exigir_perfil('ADMIN');
 *    Se vier ?id=, carregue a campanha com repo_campanha_por_id((int)$id)
 *    para editar. header.php, título "Nova campanha" ou "Editar campanha",
 *    formulário POST para processar_admin.php com hidden
 *    acao=salvar_campanha e id_campanha, título (maxlength 120),
 *    descrição (textarea), local de entrega, horário de entrega (ex.: "Seg
 *    a sex, 8h às 17h"), data de início e data de fim (opcional), botão
 *    Salvar e botao_link('Cancelar', 'index.php'). footer.php.
 *
 * 2) CONTEXTO
 *    A campanha nasce aqui, pela interface (o enunciado exige). A imagem é
 *    cuidada pelo organizador, no painel dele.
 *
 * 3) #ToDo
 *    [ ] modo novo e modo editar
 *    [ ] print para o manual
 */
