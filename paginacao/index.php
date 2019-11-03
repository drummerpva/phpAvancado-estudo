<?php
try{
    $pdo = new PDO("mysql:dbname=blog;host=localhost","root","");

} catch (PDOException $ex) {
    die($ex->getMessage());
}
$qtPorPagina = 20;
$pg = 1;
if(!empty($_GET['p'])){
    $pg = addslashes($_GET['p']);
}
$p = ($pg - 1)*$qtPorPagina;

$sql = "SELECT COUNT(1) as c FROM posts";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['c'];
$paginas = ceil($total / 10);
$sql = "SELECT * FROM posts LIMIT $p, $qtPorPagina";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach ($sql->fetchAll() as $item){
        echo $item['Id']." - ".$item['titulo']."<br/>";
    }
}

echo "<hr>";
for($i=0;$i<$paginas;$i++){
    echo "<a href='./?p=".($i+1)."'>[ ".($i+1)." ]</a>";
}