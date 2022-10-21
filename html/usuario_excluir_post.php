<?php
require_once '../global.php';

try{
    $id_usuario = $_GET['id_usuario'];

    $usuario = new Usuario($id_usuario);

    $usuario->deletar();

    setcookie("msg", "Usuario_Excluido_com_Sucesso");

    header('Location: usuarios.php');
}catch(Exception $e){
    Erro::trataErro($e);
}