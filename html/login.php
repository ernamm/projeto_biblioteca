<?php
require_once '../global.php';
require_once '../cabecalho.php';

//session_start();

if (isset($_SESSION['usuario'])) {
    header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $senha = strip_tags($_REQUEST['senha']);

    try {
        $query = "select * from usuario where email = :email LIMIT 1";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
           if(password_verify($senha, $linha['senha'])){
            $_SESSION['usuario']['nome_usuario'] = $linha['nome_usuario'];
            $_SESSION['usuario']['email'] = $linha['email'];
            $_SESSION['usuario']['id_usuario'] = $linha['id_usuario'];
            $_SESSION['usuario']['nivel_acesso'] = $linha['nivel_acesso'];


            header("location: index.php");
           } else{
            $errorMsg[] = "Email ou Senha errado";
           }
        } else {
            $errorMsg[] = "Email ou Senha errado";
        }
    } catch (Exception $e) {
        Erro::trataErro($e);
    }



}

?>

<div class="conteudo">
    <div class="central">
        <div class="login-box">
            <img src="../img/bd_logo_bgr.png" alt="" width="100%">
            <h1>LOGIN</h1>
            <form action="login.php" method="post">
                <div class="login-items">
                    <div class="form-item">
                        <label for="email"><span class="material-symbols-outlined">Mail</span></label>
                        <input type="email" name="email" id="email" title="email" placeholder="Email" required>
                    </div>
                    <div class="form-item">
                        <label for="senha"><span class="material-symbols-outlined">Key</span></label>
                        <input type="password" name="senha" id="senha" title="senha" placeholder="Senha" required>
                    </div>
                    <div>
                        <button class="botao botao-registrar"><a href="cadastro.php">Registre-se</a></button>
                        <input class="botao botao-confirma" type="submit" value="Entrar">
                    </div>
                    <div><a href="esqueceu.php">Esqueceu a senha?</a></div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

require_once '../rodape.php';

?>