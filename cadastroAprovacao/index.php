<?php
require './config.php';
if(!empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    require './config.php';
    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email'";
    $sql = $pdo->query($sql);
    $id = $pdo->lastInsertId();
    $md5 = md5($id);
    $link = "http://www.b7web.com.br/cadastroconfirma/confirma.php?h=".$md5;
    $assunto = "Confirme seu cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro: \n\n".$link;
    $headers = "From: suporte@b7web.com.br"."\r\n".
            "X-Mailer: PHP/".phpversion();
    mail($email,$assunto,$msg,$headers);
    
    echo "<h2>OK! Confirme seu cadastro agora!</h2>";
}

?>

<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" required /><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" required/><br/><br/>
    <input type="submit" value="cadastrar" />
</form>

