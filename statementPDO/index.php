<?php
require './usuarios.php';

$usuario = new Usuarios();
$usuario->excluir(5);