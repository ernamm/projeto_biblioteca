<?php

require_once '../classes/Livro.php';
require_once '../classes/Conexao.php';
require_once '../cabecalho.php';

try {
    $livro = new Livro();
    $lista = $livro->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>

<div class="conteudo">
    <!--<div>
        <form action="#">
            <div class="form-search">
                <label for="busca"><span class="material-symbols-outlined">Search</span></label>
                <input type="search" id="busca" name="busca" disabled>
            </div>
        </form>
    </div>-->
    <div>
        <!--<h1 style="font-family: Charmoman;">BIBLIOTECA BD 208</h1>-->
    </div>
    <?php if (count($lista) > 0) : ?>
        <div class="cards-container">
            <?php foreach ($lista as $item) : ?>
                <div class="card">
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['nivel_acesso'] >= 1) : ?>
                        <a href="livro_detalhe.php?id_livro=<?= $item['id_livro'] ?>">
                        <?php else : ?>
                            <a href="login.php">
                            <?php endif ?>
                            <div class="card-header">
                                <?php if ($item['capa'] != null) : ?>
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item['capa']); ?>" alt="#">
                                <?php else : ?>
                                    <img src="../img/book.png" alt="">
                                <?php endif ?>
                            </div>
                            <div class="card-footer">
                                <p>
                                    <?= $item['nome_livro'] ?>
                                </p>
                                <hr>
                                <p>
                                    <?= $item['autor_livro'] ?>
                                </p>
                                <hr>
                                <p>
                                    <?= $item['ano'] ?>
                                </p>
                            </div>
                            </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Nenhum livro cadastrado!</p>
    <?php endif ?>
</div>

<?php require_once '../rodape.php'; ?>