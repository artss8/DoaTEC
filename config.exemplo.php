<?php
/*
 * DoaTEC — config.exemplo.php
 * Dono: Pessoa 1 · PRONTO
 *
 * COPIE este arquivo para config.php e coloque a senha do SEU MySQL.
 * O config.php está no .gitignore: cada integrante tem o seu.
 */

// Pasta do projeto dentro do htdocs (endereço: http://localhost/DoaTEC/)
define('BASE_URL', '/DoaTEC');

// Banco de dados (padrão do XAMPP: usuário root sem senha)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'doatec');

// Pasta das imagens enviadas: caminho no disco e endereço no site
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('UPLOAD_URL', BASE_URL . '/uploads/');
