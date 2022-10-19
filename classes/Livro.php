<?php

class Livro{
    public $id_livro;
    public $nome_livro;
    public $editora;
    public $autor_livro;
    public $ano;
    public $gen_livro;
    public $descricao;
    public $link;
    public $capa;

    public function __construct($id_livro = false){
        if($id_livro){
            $this->id_livro = $id_livro;
            $this->carregar();
        }
    }

    public static function listar(){
        $query = "select l.id_livro, l.nome_livro, l.editora, l.autor_livro, l.ano, l.gen_livro, l.descricao, l.link, l.capa
                  from livro l";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir(){
        $query = "insert into livro (nome_livro, editora, autor_livro, ano, gen_livro, descricao, link, capa) 
                  values (:nome_livro, :editora, :autor_livro, :ano, :gen_livro, :descricao, :link, :capa)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_livro', $this->nome_livro);
        $stmt->bindValue(':editora', $this->editora);
        $stmt->bindValue(':autor_livro', $this->autor_livro);
        $stmt->bindValue(':ano', $this->ano);
        $stmt->bindValue(':gen_livro', $this->gen_livro);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':link', $this->link);
        $stmt->bindValue(':capa', $this->capa);
        $stmt->execute();
    }

    public function atualizar(){
        $query = "update livro set nome_livro = :nome_livro, editora = :editora, autor_livro = :autor_livro, ano = :ano, 
        gen_livro = :gen_livro, descricao = :descricao, link = :link, capa = :capa where id_livro = :id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_livro', $this->nome_livro);
        $stmt->bindValue(':editora', $this->editora);
        $stmt->bindValue(':autor_livro', $this->autor_livro);
        $stmt->bindValue(':ano', $this->ano);
        $stmt->bindValue(':gen_livro', $this->gen_livro);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':link', $this->link);
        $stmt->bindValue(':capa', $this->capa);
        $stmt->bindValue(":id_livro", $this->id_livro);
        $stmt->execute();
    }

    public function carregar(){
        $query = "SELECT nome_livro, editora, autor_livro, ano, gen_livro, descricao, link, capa FROM livro where id_livro=:id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_livro", $this->id_livro);
        $stmt->execute();
        $lista = $stmt->fetch();
        $this->nome_livro = $lista['nome_livro'];
        $this->editora = $lista['editora'];
        $this->autor_livro = $lista['autor_livro'];
        $this->ano = $lista['ano'];
        $this->gen_livro = $lista['gen_livro'];
        $this->descricao = $lista['descricao'];
        $this->link = $lista['link'];
        $this->capa = $lista['capa'];
    }

    public function deletar(){
        $query = "delete from livro where id_livro=:id_livro";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_livro", $this->id_livro);
        $stmt->execute();
    }
}