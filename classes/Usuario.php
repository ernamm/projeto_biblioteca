<?php

class Usuario{
    public $id_usuario;
    public $nome_usuario;
    public $email;
    public $nivel_acesso;
    public $senha;
    
    public function __construct($id_usuario = false){
        if($id_usuario){
            $this->id_usuario = $id_usuario;
            $this->carregar();
        }
    }

    public static function listar(){
        $query = "select u.id_usuario, u.nome_usuario, u.email, u.nivel_acesso, u.senha
                  from usuario u";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir(){
        $query = "insert into usuario (nome_usuario, email, nivel_acesso, senha) 
                  values (:nome_usuario, :email, :nivel_acesso, :senha)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_usuario', $this->nome_usuario);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nivel_acesso', $this->nivel_acesso);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();
    }

    public function atualizar(){
        $query = "update usuario set nome_usuario = :nome_usuario, email = :email, nivel_acesso = :nivel_acesso, senha = :senha, 
         where id_usuario = :id_usuario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_usuario', $this->nome_usuario);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nivel_acesso', $this->nivel_acesso);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(":id_usuario", $this->id_usuario);
        $stmt->execute();
    }

    public function carregar(){
        $query = "SELECT nome_usuario, email, nivel_acesso, senha FROM usuario where id_usuario=:id_usuario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_usuario", $this->id_usuario);
        $stmt->execute();
        $lista = $stmt->fetch();
        $this->nome_usuario = $lista['nome_usuario'];
        $this->email = $lista['email'];
        $this->nivel_acesso = $lista['nivel_acesso'];
        $this->senha = $lista['senha'];
    }

    public function deletar(){
        $query = "delete from usuario where id_usuario=:id_usuario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_usuario", $this->id_usuario);
        $stmt->execute();
    }
}