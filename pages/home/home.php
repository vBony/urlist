<?php
session_start();
ini_set('default_charset','UTF-8');
include "../../assets/classes/classes.php";
include "homeConfig.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles/home.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>urlist - Home</title>
</head>
<body>
    <div id="headBackground">
        <div id="logo">urlist</div>
        <div id="userArea">Olá, <span id="userName"><?php echo $user->getNome(); ?></span></div>
    </div>

    <div id="corpo">

    </div>
    
</body>
</html>