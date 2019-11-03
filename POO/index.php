<?php

class Post {

    private $titulo;
    private $data;
    private $corpo;
    private $comentarios;
    private $qtdComentarios;
    
    
    //construtor
    public function __construct($titulo,$corpo) {
        $this->setTitulo($titulo);
        $this->setCorpo($corpo);
    }
    
    public function addConmentario($comentario){
        $this->comentarios[] = $comentario;
        $this->contarComentarios();
    }
    private function contarComentarios(){
        $this->qtdComentarios = count($this->comentarios);
    }
    
    
    public function getQuantidadeComentarios(){
        return $this->qtdComentarios;
    }
    
    
    
    
    //getters
    public function getTitulo() {
        return $this->titulo;
    }

    public function getData() {
        return $this->data;
    }

    public function getCorpo() {
        return $this->corpo;
    }

    public function getComentarios() {
        return $this->comentarios;
    }

    //setters
    public function setTitulo($titulo) {
        if (is_string($titulo)) {
            $this->titulo = $titulo;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setCorpo($corpo) {
        $this->corpo = $corpo;
    }

    public function setComentarios($comentatios) {
        $this->comentarios = $comentarios;
    }

}

$post = new Post("Titulos novo","Corpo do Post");

echo "Titulo do Post: ".$post->getTitulo()."<br>e corpo:".$post->getCorpo();
$post->addConmentario("COmentarios1");
$post->addConmentario("COmentarios2");
$post->addConmentario("COmentarios3");
$post->addConmentario("COmentarios4");
$post->addConmentario("COmentarios5");
echo "<p>".$post->getQuantidadeComentarios()."</p>";
//acesso sem instanciar - não recomendado
//Pessoa::conectarBanco();