<?php
require "registerConfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/frameworks/bootstrap.min.css">
    <script type="text/javascript" src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../assets/frameworks/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../styles/register.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
    <title>urlist - Registro</title>
</head>
<body>
    <div id="arearegistro">
        <div id="titulo">
            <h1>urlist</h1>
            <span id="subtitulo">registro</span>
        </div>

        <div id="formulario">
            <form method="post">
                <div class="defaultArea">
                <p class="label">Nome completo: </p>
                <input type="text" name="nome" class="campos" placeholder="Ex: Cecilia Vaz" autofocus required="required">
                </div>

                <div class="defaultArea">
                <p class="label">Nº de celular: </p>  
                <input type="text" name="telefone" class="campos" placeholder="Ex: 61995428182" required="required">
                </div>

                <div class="defaultArea">
                <p class="label">Email: </p>
                <input type="email" name="email" class="campos" placeholder="Ex: ceciliavaz@hotmail.com" required="required">
                </div>

                <div class="defaultArea">
                <p class="label">Senha: </p>
                <input type="password" name="senha" class="campos" placeholder="min. 4 caracteres" required="required">
                <input type="password" id="senhanovamente" class="campos" placeholder="Digite novamente sua senha">
                </div>

                <div id="btnArea">
                    <button id="btnCadastrar" type="submit" class="btns">Cadastrar-se</button>
                    <!-- <button id="btnCancelar" class="btns" onclick="voltar(this)">Cancelar</button> -->
                </div>
            </form>

        </div>
    </div>
</body>
</html>