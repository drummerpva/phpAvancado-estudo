<?php
    session_start();
        include './Contato.class.php';
    if(!empty($_POST['email'])){
        $id = $_POST['idAlt'];
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $contato = new Contato();
        $contato->editar($nome,$email,$id);
        header("Location:./");
        exit;
    }
    $item = array();
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $contato = new Contato();
        $item = $contato->getContato($id);
    }
    

?>
<h1>Editar</h1>
<form method="POST">
    <input type="hidden" name="idAlt" value="<?php echo $item['id'];?>" />
    Nome:<br/>
    <input type="text" name="nome" required value="<?php echo $item['nome'];?>"/><br/><br/>
    Email:<br/>
    <input type="email" name="email" required value="<?php echo $item['email'];?>"/><br/><br/>
    <input type="submit" value="Atualizar" />
</form>