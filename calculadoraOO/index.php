<?php

class Calculadora {
    private $numero;
    
    public function __construct($numero) {
       $this->numero = $numero;
    }
    public function somar($numero) {
        $this->numero += $numero;
       return $this;
    }
    public function subtrair($numero) {
        $this->numero -= $numero;
       return $this;
    }
    public function multiplicar($numero){
        $this->numero *= $numero;
       return $this;
    }
    public function dividir($numero){
        $this->numero /= $numero;
       return $this;
    }
    public function resultado(){
        return $this->numero;
    }

}
$calculadora = new Calculadora(10);
$calculadora->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);
echo "Resultado.: ".$calculadora->resultado();

?>
