<?php
// Configurações do projeto
define('DB_HOST', 'localhost');
define('DB_NAME', 'estante');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Autoload manual (caso não use Composer ainda)
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../classes/' . $class . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});
