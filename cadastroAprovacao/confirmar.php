<?php
require './config.php';
if(!empty($_GET['h'])){
    $pdo->query("UPDATE usuarios SET status = 1 WHERE MD5(id) = {$_GET['h']}");
    echo "Email ativado com sucesso!";
}