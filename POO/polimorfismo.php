<?php

class Animal{
    public function getNome(){
        echo "getNome da Classe Animal";
    }
    public function testar(){
        echo "<p>Testado</p>";
    }
}
class Cachorro extends Animal{
    public function getNome(){
       $this->testar();
    }
    
}

$animal = new Animal();
$animal->getNome();

$cachorro = new Cachorro();
$cachorro->getNome();