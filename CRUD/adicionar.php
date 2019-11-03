<?php
    session_start();
        include './Contato.class.php';
    if(!empty($_POST['email'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $contato = new Contato();
        $contato->adicionar($email,$nome);
        header("Location:./");
        exit;
    }

?>
<h1>Adicionar</h1>
<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" required /><br/><br/>
    Email:<br/>
    <input type="email" name="email" required /><br/><br/>
    <input type="submit" value="Cadastrar" />
</form>