<?php
require_once '../global.php';
require_once '../cabecalho.php';

try {
    $usuario = new Usuario();
    $lista = $usuario->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

?>

<div class="conteudo">
    <div id="toast"></div>
    <div>
        <div style="text-align:end; margin-right:3%;">
            <a href="adiciona_usuario.php" class=""><span class="material-symbols-outlined" style="color: yellowgreen; font-size:2em;" title="Adiciona Usuario">Add_Box</span></a>
        </div>
        <?php if (count($lista) > 0) : ?>
            <div id="tabela" style="overflow-x: auto;">
                <table>
                    <caption>GERENCIAMENTO</caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível de Acesso</th>
                            <th class="acao">Editar</th>
                            <th class="acao">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $item) : ?>
                            <tr>
                                <td><?= $item['id_usuario'] ?></td>
                                <td><?= $item['nome_usuario'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['nivel_acesso'] ?></td>
                                <td><a href="usuario_editar.php?id_usuario=<?= $item['id_usuario'] ?>"><span class="material-symbols-outlined" title="Editar Usuario" style="color: orange;">edit</span></a></td>
                                <td><a href="usuario_excluir_post.php?id_usuario=<?= $item['id_usuario'] ?>"><span class="material-symbols-outlined" title="Deletar Usuario" style="color: firebrick;">delete</span></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Nenhum Usuario cadastrado!</p>
            <?php endif ?>
            </div>
    </div>

</div>

<?php

require_once '../rodape.php';

?>