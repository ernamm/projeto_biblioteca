<?php

require_once '../classes/Livro.php';
require_once '../classes/Conexao.php';
require_once '../cabecalho.php';


try {
    $id_livro = $_GET['id_livro'];
    $livro = new Livro($id_livro);
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>



<div class="conteudo">
    <div class="cards-container">
        <div class="card-detalhe">
            <div class="card-header">
                <?php if ($livro->capa != null) : ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($livro->capa); ?>" alt="#" style="border: none; height:fit-content;">
                <?php else : ?>
                    <img src="../img/book.png" alt="">
                <?php endif ?>
            </div>
            <div class="card-footer" style="text-align:left; height: auto;">
                <div>
                    <p>
                        <b>Título:</b> <?= $livro->nome_livro ?>
                    </p>
                    <hr>
                    <p>
                        <b>Autor:</b> <?= $livro->autor_livro ?>
                    </p>
                    <hr>
                    <p>
                        <b>Editora:</b> <?= $livro->editora ?>
                    </p>
                    <hr>
                    <p>
                        <b>Ano:</b> <?= $livro->ano ?>
                    </p>
                    <hr>
                    <p>
                        <b>Gênero:</b> <?= $livro->gen_livro ?>
                    </p>
                    <hr>
                    <p>
                        <b>Descrição:</b> <?= $livro->descricao ?>
                    </p>
                </div>
                <div>
                    <a style="float: right; margin:2%;" href="<?= $livro->link ?>" class="botao botao-confirma" target="_blank">Ver</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

require_once '../rodape.php';

?>