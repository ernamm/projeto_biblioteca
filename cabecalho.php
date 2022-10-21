<?php
require_once '../global.php';
require_once '../cabecalho.php';
session_start();


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/biblioteca.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Charmonman">
</head>

<body>
    <div class="cabecalho">
        <div class="nav">
            <div class="logo">
                <a href="index.php"><img src="../img/bd_logo_bgr.png" alt="logo: biblioteca bd 208"></a>
            </div>

            <div id="menu-container">
                <ul id="menu">
                    <li><a href="index.php">inicio</a></li>
                    <li><a href="sobre.php">sobre</a></li>
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['nivel_acesso'] >= 2) : ?>
                    <li><a href="registros.php">registros</a></li>
                    <li><a href="usuarios.php">usuarios</a></li>
                    <?php endif ?>
                    <?php if (isset($_SESSION['usuario'])) : ?>
                        <li>
                            <a href="logout.php" id="menu_sair">
                                <?php echo "Olá, " . $_SESSION['usuario']['nome_usuario'] ?>
                                <span class="material-symbols-outlined">Logout</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li><a href="login.php"><span class="material-symbols-outlined">Account_Circle</span></a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>