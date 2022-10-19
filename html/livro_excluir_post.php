<?php
require_once '../global.php';

try{
    $id_livro = $_GET['id_livro'];

    $livro = new Livro($id_livro);

    $livro->deletar();

    setcookie("msg", "Livro_Excluido_com_Sucesso");

    header('Location: registros.php');
}catch(Exception $e){
    Erro::trataErro($e);
}