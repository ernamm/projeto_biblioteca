<?php
require_once '../global.php';

try {
    $id_usuario = $_POST['id_usuario'];
    $nome_usuario = $_POST['nome_usuario'];
    $email = $_POST['email'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $usuario = new Usuario($id_usuario);
    $usuario->nome_usuario = $nome_usuario;
    $usuario->email = $email;
    $usuario->nivel_acesso = $nivel_acesso;
    $usuario->atualizar();

    setcookie("msg", "Usuario_Atualizado_com_Sucesso");
    header('Location: usuarios.php');
} catch (Exception $e) {
    Erro::trataErro($e);
}
