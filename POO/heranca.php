<?php

abstract class Animal{
    public $nome;
    private $idade;
    //abstract obriga a classe que herdar a implementar esta classe
    abstract protected function andar();
}
class Cavalo extends Animal{
    private $qtdPatas;
    private $tipoPelo;
    public function andar(){
        
    }
    
}
class Gato extends Animal{
    private $qtdPatas;
    private $miado;
    public function andar(){
        
    }
}

$cavalo = new Cavalo();
$cavalo->nome = "Peregrino";

echo "O nome do cavalo é :".$cavalo->nome;