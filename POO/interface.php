<?php

interface Animal{
    public function andar();
}
class Cachorro implements Animal{
    public function andar(){
        echo "Estou andando...";
    }
}
$cachorro = new Cachorro();
$cachorro->andar();

