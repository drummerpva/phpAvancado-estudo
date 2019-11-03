<?php

class Usuarios {

    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:dbname=blog;host=localhost","root","");
        } catch (PDOException $ex) {
            echo "Falha na conexao! Erro: " . $ex->getMessage();
        }
    }
    
    public function selecionar($id){
        //$sql = "SELECT * FROM usuarios WHERE id = $id";
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $array = array();
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }
    public function inserir($nome, $email, $senha){
        $senha = md5($senha);
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome=:nome, email=:email, senha=:senha");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
        $sql->execute();
    }
    
    public function atualizar($nome,$email,$senha,$id){
        $sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($nome,$email,md5($senha),$id));
    }
    public function excluir($id){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }

}
