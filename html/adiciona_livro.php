<?php
require_once '../global.php';
require_once '../cabecalho.php';



?>


<div class="conteudo">
    <div>
        <form action="adiciona_livro_post.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formulario">
                   
                    <div class="form-item">
                        <label for="capa"><span class="material-symbols-outlined">Image</span></label>
                        <input type="file" name="capa" id="capa" title="capa">
                    </div>

                    <div class="form-item">
                        <label for="nome_livro"><span class="material-symbols-outlined">Menu_Book</span></label>
                        <input type="text" name="nome_livro" id="nome_livro" title="Titulo" placeholder="Titulo" size="40" autofocus>
                    </div>

                    <div class="form-item">
                        <label for="editora"><span class="material-symbols-outlined">History_Edu</span></label>
                        <input type="text" name="editora" id="editora" title="Editora" placeholder="Editora" size="40">
                    </div>

                    <div class="form-item">
                        <label for="autor_livro"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="autor_livro" id="autor_livro" title="Autor" placeholder="Autor" size="40">
                    </div>

                    <div class="form-item">
                        <label for="ano"><span class="material-symbols-outlined">Calendar_Month</span></label>
                        <input type="number" name="ano" id="ano" title="ano" placeholder="Ano" size="4" maxlength="4">
                    </div>

                    <div class="form-item">
                        <label for="gen_livro"><span class="material-symbols-outlined">Star</span></label>
                        <input type="text" name="gen_livro" id="gen_livro" title="Genero" placeholder="Genero" size="40">
                    </div>

                    <div class="form-item">
                        <label for="link"><span class="material-symbols-outlined">Link</span></label>
                        <input type="text" name="link" id="link" title="Link" placeholder="Link" size="40">
                    </div>

                    <div class="form-item">
                        <label for="descricao"><span class="material-symbols-outlined">Description</span></label>
                        <textarea name="descricao" id="descricao" title="Descricao" placeholder="Descricao" cols="40" rows="10"></textarea>
                    </div>


                    <div style="align-self:flex-end;">
                        <input class="botao botao-limpa" type="reset" value="Limpar">
                        <input class="botao botao-confirma" name="enviar" type="submit" value="Salvar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php
require_once '../rodape.php';
?>