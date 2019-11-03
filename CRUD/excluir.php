<?php

if (!empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    include './Contato.class.php';
    $contato = new Contato();
    $contato->excluir($id);
}
header("Location:./");
exit;
