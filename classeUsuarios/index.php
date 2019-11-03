<?php
require './usuario.php';
$usuario = new Usuario(3);
$usuario->deletar();
echo "Usuario deletado com sucesso! ";