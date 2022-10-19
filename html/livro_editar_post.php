<?php
require_once '../global.php';

try{
    $id_livro = $_POST['id_livro'];
    $nome_livro = $_POST['nome_livro'];
    $editora = $_POST['editora'];
    $autor_livro = $_POST['autor_livro'];
    $ano = $_POST['ano'];
    $gen_livro = $_POST['gen_livro'];
    $descricao = $_POST['descricao'];
    $link = $_POST['link'];
    if (!empty($_FILES['capa']['tmp_name'])){
        $capa = file_get_contents($_FILES['capa']['tmp_name']);
    }
    
    
    $livro = new Livro($id_livro);
    $livro->nome_livro = $nome_livro;
    $livro->editora = $editora;
    $livro->autor_livro = $autor_livro;
    $livro->ano = $ano;
    $livro->gen_livro = $gen_livro;
    $livro->descricao = $descricao;
    $livro->link = $link;
    $livro->capa = $capa;
    $livro->atualizar();

    setcookie("msg", "Livro_Atualizado_com_Sucesso");
    header('Location: registros.php');
}catch(Exception $e){
    Erro::trataErro($e);
}