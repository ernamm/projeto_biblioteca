<?php
require_once '../global.php';
require_once '../cabecalho.php';


if (isset($_SESSION['usuario'])) {
    header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = htmlspecialchars($_REQUEST['nome_usuario']);
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $senha = strip_tags($_REQUEST['senha']);

    try {
        $query = "select nome_usuario, email from usuario where email = :email";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($linha['email']) == '$email') {
            $errorMsg[1][] = "Esse email ja foi cadastrado!";
        } else {
            $hash_pass = password_hash($senha, PASSWORD_DEFAULT);
            $criado = new DateTime();
            $criado = $criado->format('Y-m-d H:i:s'); //formato especifico para mysql

            $query = "insert into usuario (nome_usuario, email, senha) 
                  values (:nome_usuario, :email, :senha)";
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':nome_usuario', $nome_usuario);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $hash_pass);
            if($stmt->execute()){
                setcookie("msg", "Usuário_Cadastrado_com_Sucesso");
                header("location: login.php");
            } else {
                
            }
            
        }
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}
?>

<div class="conteudo">
    <div>
        <form action="cadastro.php" method="post">
            <fieldset>
                <div class="formulario">
                    <div class="form-item">
                        <label for="nome_usuario"><span class="material-symbols-outlined">Person</span></label>
                        <input type="text" name="nome_usuario" id="nome_usuario" title="Nome" placeholder="Nome" size="40" autofocus required>
                    </div>

                    <div class="form-item">
                        <label for="email"><span class="material-symbols-outlined">Mail</span></label>
                        <input type="email" name="email" id="email" title="E-Mail" placeholder="Email" size="40" required>
                    </div>

                    <div class="form-item">
                        <label for="senha"><span class="material-symbols-outlined">Key</span></label>
                        <input type="password" name="senha" id="senha" title="Senha" placeholder="Senha" size="40" required>
                    </div>

                    <!--<div class="form-item">
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
                    </div>-->

                    <div style="align-self:flex-end;">
                        <input class="botao botao-limpa" type="reset" value="Limpar">
                        <input class="botao botao-confirma" type="submit" id="cadastrar" value="Cadastrar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php

require_once '../rodape.php';

?>