<?php
if(!empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['mensagem']);
    $para = "douglaspoma@yahoo.com";
    $assunto = "Pergunta do Contato";
    $corpo = "Nome: $nome - E-mail: $email - <br>Mensamge: $mensagem";
    $cabeçalho = "From: douglas.poma@registrallogistica.com.br"."\r\n".
                 "Reply-To: $email"."\r\n".
                 "X-Mailer: PHP/". phpversion();

    if(mail($para,$assunto,$corpo,$cabeçalho)){
        echo "<h2>Email Enviado com sucesso!</h2>";
    }
    exit;
}


?>


<form method="POST">
    Nome:<br/>
    <input type="text" name="nome" require/><br/><br/>
    E-mail:<br/>
    <input type="email" name="email" require/><br/><br/>
    Mensagem:<br/>
    <textarea name="mensagem">
        
    </textarea><br/><br/>
    <input type="submit" value="Enviar"/>
</form>