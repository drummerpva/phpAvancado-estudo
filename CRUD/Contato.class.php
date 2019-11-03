<?php

class Contato {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=projeto_crudoo;host=localhost", "root", "");
        } catch (PDOException $ex) {
            echo "Erro na conexao com BD! Erro: " . $ex->getMessage();
        }
    }

    public function adicionar($email, $nome = '') {
        //verificar se o e-mail ja existe
        if (!$this->existeEmail($email)) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();
        } else {
            return false;
        }
        //adicionar
    }

    public function getContato($id) {
        $email = addslashes($id);
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $info = $sql->fetch();
            return $info;
        } else
            return '';
    }

    public function getAll() {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function editar($nome,$email,$id) {
        $nome = addslashes($nome);
        $email = addslashes($email);
        if (!$this->existeEmail($email)) {
            $sql = "UPDATE contatos SET nome=:nome, email=:email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {
        $id = addslashes($id);
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function existeEmail($email) {
        $email = addslashes($email);
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
