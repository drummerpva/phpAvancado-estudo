<?php
include './Contato.class.php';

$contato = new Contato();
?>
<h1>Contatos</h1>
<a href="adicionar.php">[ ADICIONAR ]</a>
<table border='1' width="600">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php
    $list = $contato->getAll();
    foreach ($list as $item){
       ?>
    <tr>
        <td><?php echo $item['id'];?></td>
        <td><?php echo $item['nome'];?></td>
        <td><?php echo $item['email'];?></td>
        <td nowrap>
            <a href="editar.php?id=<?php echo $item['id'];?>">[ EDITAR ]</a>
            <a href="excluir.php?id=<?php echo $item['id'];?>">[ EXCLUIR ]</a>
        </td>
    </tr>
           
           
       <?php 
    }
    ?>
</table>