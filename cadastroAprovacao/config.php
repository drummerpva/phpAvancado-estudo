<?php
try{
    $pdo = new PDO("mysql:dbname=projeto_cadastros;host=localhost","root","");
    
} catch (PDOException $ex) {
    die($ex->getMessage());
}