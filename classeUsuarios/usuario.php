<?php

class Usuario {

    private $id;
    private $email;
    private $nome;
    private $senha;
    private $pdo;

    public function __construct($i = '') {
        try {
            $this->pdo = new PDO("mysql:dbname=usuarios;host=localhost", "root", "");
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
        if (!empty($i)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
            $sql->execute(array($i));
            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->id = $data['id'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->senha = $data['senha'];
            }
        }
    }

    public function salvar() {
        if (!empty($this->id)) {
            $sql = $this->pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
            $sql->execute(array($this->nome,$this->email,$this->senha,$this->id));
        } else {
            $sql = $this->pdo->prepare("INSERT INTO usuarios(nome,email,senha) VALUES(?,?,?)");
            $sql->execute(array($this->nome,$this->email,$this->senha));
            $this->id = $this->pdo->lastInsertId();
            
        }
    }
    public function deletar(){
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($this->id));
    }

    //getter and setter
    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

}
