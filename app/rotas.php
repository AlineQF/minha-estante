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

     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['autor'], $_POST['nota'])) {
        
        $titulo = htmlspecialchars($_POST['titulo']);
        $autor = htmlspecialchars($_POST['autor']);
        $nota = (float)filter_var($_POST['nota'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 

        $livro = new Livro($titulo, $autor, $nota); 
        
        echo "<h3>✅ Livro Cadastrado com Sucesso!</h3>";
        echo "<p>Título: **{$livro->getTitulo()}**</p>";
        echo "<p>Autor: **{$livro->getAutor()}**</p>";
        echo "<p>Nota: **{$livro->getNota()}**</p>";
        
    } else {
        echo "<h3>Cadastrar Novo Livro</h3>";
       
        echo '
        <form method="POST" action="?page=livro" style="padding: 20px; border: 1px solid #ccc; max-width: 400px;">
            <label for="titulo">Título do Livro:</label><br>
            <input type="text" id="titulo" name="titulo" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
            
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
            
            <label for="nota">Nota (0 a 10):</label><br>
            <input type="number" id="nota" name="nota" min="0" max="10" step="0.1" required style="width: 100%; padding: 8px; margin-bottom: 20px;"><br>
            
            <button type="submit" style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Cadastrar Livro</button>
        </form>
        ';
    }
    
    echo "<br><a href='?page=home'>Voltar</a>";
    include __DIR__ . '/../includes/footer.php';
}

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