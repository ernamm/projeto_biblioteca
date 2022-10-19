<?php
require_once '../global.php';
require_once '../cabecalho.php';

?>

<div class="conteudo">
    <div class="central">
        <div class="login-box">
            <img src="../img/livros.png" alt="">
            <h1>LOGIN</h1>
            <form action="#" method="post">
                <div class="login-items">
                    <div class="form-item">
                        <label for="usuario"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="usuario" id="usuario" title="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-item">
                        <label for="senha"><span class="material-symbols-outlined">Key</span></label>
                        <input type="password" name="senha" id="senha" title="senha" placeholder="Senha">
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