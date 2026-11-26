<?php
/*
 * DoaTEC — index.php
 * Dono: Pessoa 1 · PRONTO
 *
 * Página inicial E painel único de todos os perfis. O conteúdo fica em
 * includes/painel.php: bloco da campanha igual para todos + botões e seção
 * de acordo com o perfil (visitante, doador, organizador, admin).
 * Depois do login e de qualquer ação, todo mundo volta para cá:
 *     ir_para('index.php');
 */
require __DIR__ . '/includes/iniciar.php';

$titulo_pagina = 'Início';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/painel.php';
require __DIR__ . '/includes/footer.php';
