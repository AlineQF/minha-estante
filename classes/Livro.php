<?php
class Livro {
    private $titulo;
    private $autor;
    private $nota; // <-- NOVA PROPRIEDADE

    // Ajustamos o construtor para receber a nota
    public function __construct($titulo, $autor, $nota) { 
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->nota = $nota; // <-- ATRIBUIÇÃO
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    // <-- NOVO MÉTODO
    public function getNota() {
        return $this->nota;
    }
}