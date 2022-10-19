<?php
require_once '../global.php';
require_once '../cabecalho.php';

try {
    $id_livro = $_GET['id_livro'];
    $livro = new Livro($id_livro);
} catch (Exception $e) {
    Erro::trataErro($e);
}


?>


<div class="conteudo">
    <div>
        <form action="livro_editar_post.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formulario">

                    <div class="form-item">
                        <label for="id_livro"><span class="material-symbols-outlined">Database</span></label>
                        <input type="number" name="id_livro" id="id_livro" title="ID"  size="1" value="<?= $livro->id_livro ?>" readonly>
                    </div>

                    <div class="form-item">
                        <label for="capa"><span class="material-symbols-outlined">Image</span></label>
                        <input type="file" name="capa" id="capa" title="capa">
                    </div>

                    <div class="form-item">
                        <label for="nome_livro"><span class="material-symbols-outlined">Menu_Book</span></label>
                        <input type="text" name="nome_livro" id="nome_livro" title="Titulo" placeholder="Titulo" size="40" value="<?= $livro->nome_livro ?>">
                    </div>

                    <div class="form-item">
                        <label for="editora"><span class="material-symbols-outlined">History_Edu</span></label>
                        <input type="text" name="editora" id="editora" title="Editora" placeholder="Editora" size="40" value="<?= $livro->editora ?>">
                    </div>

                    <div class="form-item">
                        <label for="autor_livro"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="autor_livro" id="autor_livro" title="autor" placeholder="Autor" size="40" value="<?= $livro->autor_livro ?>">
                    </div>

                    <div class="form-item">
                        <label for="ano"><span class="material-symbols-outlined">Calendar_Month</span></label>
                        <input type="number" name="ano" id="ano" title="ano" placeholder="Ano" size="4" maxlength="4" value="<?= $livro->ano ?>">
                    </div>

                    <div class="form-item">
                        <label for="gen_livro"><span class="material-symbols-outlined">Star</span></label>
                        <input type="text" name="gen_livro" id="gen_livro" title="Genero" placeholder="Genero" size="40" value="<?= $livro->gen_livro ?>">
                    </div>

                    <div class="form-item">
                        <label for="link"><span class="material-symbols-outlined">Link</span></label>
                        <input type="text" name="link" id="link" title="Link" placeholder="Link" size="40" value="<?= $livro->link ?>">
                    </div>

                    <div class="form-item">
                        <label for="descricao"><span class="material-symbols-outlined">Description</span></label>
                        <textarea name="descricao" id="descricao" title="Descricao" placeholder="Descricao" cols="40" rows="10"><?= $livro->descricao ?></textarea>
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