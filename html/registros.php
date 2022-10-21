<?php
require_once '../global.php';
require_once '../cabecalho.php';

try {
    $livro = new Livro();
    $lista = $livro->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>

<div class="conteudo">
    <div id="toast"></div>
    <div>
        <div style="text-align:end; margin-right:3%;">
            <a href="adiciona_livro.php" class=""><span class="material-symbols-outlined" style="color: yellowgreen; font-size:2em;" title="Adiciona Livro">Add_Box</span></a>
        </div>
        <?php if (count($lista) > 0) : ?>
            <div id="tabela" style="overflow-x: auto;">
                <table>
                    <caption>GERENCIAMENTO</caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Editora</th>
                            <th>Autor</th>
                            <th>Ano</th>
                            <th>Genero</th>
                            <th>Descricao</th>
                            <th>Link</th>
                            <th class="acao">Editar</th>
                            <th class="acao">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $item) : ?>
                            <tr>
                                <td><?= $item['id_livro'] ?></td>
                                <td><?= $item['nome_livro'] ?></td>
                                <td><?= $item['editora'] ?></td>
                                <td><?= $item['autor_livro'] ?></td>
                                <td><?= $item['ano'] ?></td>
                                <td><?= $item['gen_livro'] ?></td>
                                <td><?= $item['descricao'] ?></td>
                                <td><?= $item['link'] ?></td>
                                <td><a href="livro_editar.php?id_livro=<?= $item['id_livro'] ?>"><span class="material-symbols-outlined" title="Editar Livro" style="color: orange;">edit</span></a></td>
                                <td><a href="livro_excluir_post.php?id_livro=<?= $item['id_livro'] ?>"><span class="material-symbols-outlined" title="Deletar Livro" style="color: firebrick;">delete</span></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Nenhum livro cadastrado!</p>
            <?php endif ?>
            </div>
    </div>

</div>

<?php

require_once '../rodape.php';

?>