<?php
require_once '../global.php';
require_once '../cabecalho.php';

?>

<div class="conteudo">
    <div>
        <form action="#" method="post">
            <fieldset>
                <div class="formulario">
                    <div class="form-item">
                        <label for="nome"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="nome" id="nome" title="Nome" placeholder="Nome" size="40" autofocus>
                    </div>

                    <div class="form-item">
                        <label for="cpf"><span class="material-symbols-outlined">Badge</span></label>
                        <input type="text" name="cpf" id="cpf" title="CPF" placeholder="CPF" maxlength="11">
                    </div>

                    <div class="form-item">
                        <label for="endereco"><span class="material-symbols-outlined">Home_Pin</span></label>
                        <input type="text" name="endereco" id="endereco" title="Endereço" placeholder="Endereço" size="40">
                    </div>

                    <div class="form-item">
                        <label for="email"><span class="material-symbols-outlined">Mail</span></label>
                        <input type="email" name="email" id="email" title="E-Mail" placeholder="Email" size="40">
                    </div>

                    <div class="form-item">
                        <label for="telefone"><span class="material-symbols-outlined">Call</span></label>
                        <input type="tel" name="telefone" id="telefone" title="Telefone" placeholder="Telefone">
                    </div>

                    <div class="form-item">
                        <label for="nascimento"><span class="material-symbols-outlined">Calendar_Month</span></label>
                        <input type="date" name="nascimento" id="nascimento" title="Data de Nascimento">
                    </div>

                    <div style="align-self:flex-end;">
                        <input class="botao botao-limpa" type="reset" value="Limpar">
                        <input class="botao botao-confirma" type="submit" value="Enviar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php

require_once '../rodape.php';

?>