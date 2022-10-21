<?php
require_once '../global.php';
require_once '../cabecalho.php';

try {
    $id_usuario = $_GET['id_usuario'];
    $usuario = new Usuario($id_usuario);
} catch (Exception $e) {
    Erro::trataErro($e);
}


?>


<div class="conteudo">
    <div>
        <form action="usuario_editar_post.php" method="post">
            <fieldset>
                <div class="formulario">

                    <div class="form-item">
                        <label for="id_usuario"><span class="material-symbols-outlined">Database</span></label>
                        <input type="number" name="id_usuario" id="id_usuario" title="ID" size="1" value="<?= $usuario->id_usuario ?>" readonly>
                    </div>

                    <div class="form-item">
                        <label for="nome_usuario"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="nome_usuario" id="nome_usuario" title="Nome" placeholder="Nome" value="<?= $usuario->nome_usuario ?>" size="40" autofocus required>
                    </div>

                    <div class="form-item">
                        <label for="email"><span class="material-symbols-outlined">Mail</span></label>
                        <input type="email" name="email" id="email" title="E-Mail" placeholder="Email" size="40" value="<?= $usuario->email ?>" required>
                    </div>

                    <div class="form-item">
                        <label for="nivel_acesso"><span class="material-symbols-outlined">Admin_Panel_Settings</span></label>
                        <input type="number" name="nivel_acesso" id="nivel_acesso" title="Nivel de Acesso" placeholder="Nivel de Acesso" size="40" value="<?= $usuario->nivel_acesso ?>" required>
                    </div>


                    <div style="align-self:flex-end;">
                        <input class="botao botao-confirma" type="submit" value="Atualizar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>


<?php
require_once '../rodape.php';
?>