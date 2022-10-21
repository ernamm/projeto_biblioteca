<?php
require_once '../global.php';

try {
    $usuario = new Usuario();
    $nome_usuario = $_POST['nome_usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $usuario->nome_usuario = $nome_usuario;
    $usuario->email = $email;
    $usuario->senha = $senha;
    $usuario->inserir();

    setcookie("msg", "Usuario_Adicionado_com_Sucesso");



    header('Location: usuarios.php');
} catch (Exception $e) {
    Erro::trataErro($e);
}
