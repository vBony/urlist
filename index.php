<?php require "indexconfig.php";
    if(!isset($_GET['sts']) && empty($_GET['sts'])){
        $_GET['sts'] = "none";
    }

    if(!isset($_GET['login']) && empty($_GET['login'])){
        $_GET['login'] = "none";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/frameworks/bootstrap.min.css">
    <script type="text/javascript" src="assets/frameworks/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/frameworks/bootstrap.min.js"></script>
    <script src="scripts/index.js"></script>
    <title>urlist - A sua lista telefonica online!</title>
    <link rel="stylesheet" href="styles/index.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    <?php if($_GET['sts'] == "scs"){ ?>
        <div class="alert alert-success" id="alertasucess">
            <STRONG>Conta criada com sucesso, agora faça login para continuar!</STRONG>
        </div>
    <?php } ?>
    <div id="arealogin">
        <div id="titulo">urlist</div>
        <div id="subtitulo" >Faça login ou registre-se para guardar todos os contatos com segurança! :)</div>
        <div>
        <form method="post">
            <div id="areaemail">
            <p class="label">Email: </p>
            <input type="text" name="email" id="email" class="camposlogin" autofocus>
            </div>

            <div id="areasenha">
            <p class="label">Senha: </p>
            <input type="password" name="senha" id="senha" class="camposlogin">
            </div>

            <?php if($_GET['login'] == "false"){ ?>

                <div class="alert alert-danger" role="alert" id="alertLogin">
                    Usuario ou senha não encontrado, por favor tente novamente!
                    <span id="fecharBtn" onclick="fecharEvent()"> X </span>
                </div>

            <?php } ?>

            <div id="areasubmit" onclick="fechaEvent()">
            <button type="submit" id="btnsubmit">Entrar</button>
            </div>
        </form>

        <div id="arearegistro">
            <p id="registrop">Não possui uma conta? <a href="pages/register/register.php" id="linkregistro" target="_blank"> Crie uma agora </a>, é de graça! :)</p>
        </div>
    </div>
    
</body>
</html>