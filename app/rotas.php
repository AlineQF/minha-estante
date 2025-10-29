<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Usuario.php';
require_once __DIR__ . '/../classes/Livro.php';

function home() {
    include __DIR__ . '/../includes/header.php';
    echo "<h2>Bem-vindo à Biblioteca Virtual</h2>";
    echo "<p>Use as rotas abaixo para testar:</p>";
    echo "<ul>
            <li><a href='?page=usuario'>Criar Usuário</a></li>
            <li><a href='?page=livro'>Criar Livro</a></li>
          </ul>";
    include __DIR__ . '/../includes/footer.php';
}

function usuario() {
    include __DIR__ . '/../includes/header.php';
    $user = new Usuario("Aline Queiroz", "aline@email.com");
    echo "<p>Usuário criado: {$user->getNome()} - {$user->getEmail()}</p>";
    echo "<a href='?page=home'>Voltar</a>";
    include __DIR__ . '/../includes/footer.php';
}

function livro() {
    include __DIR__ . '/../includes/header.php';
    $livro = new Livro("Aprendendo PHP", "Aline Queiroz");
    echo "<p>Livro criado: {$livro->getTitulo()} - Autor: {$livro->getAutor()}</p>";
    echo "<a href='?page=home'>Voltar</a>";
    include __DIR__ . '/../includes/footer.php';
}

// Roteamento simples
$page = $_GET['page'] ?? 'home';
switch($page) {
    case 'usuario':
        usuario();
        break;
    case 'livro':
        livro();
        break;
    default:
        home();
        break;
}
