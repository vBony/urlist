<?php
session_start();
ini_set('default_charset','UTF-8');
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
    <script src="../../scripts/home.js"></script>
    <title>urlist - Home</title>
</head>
<body>
    <div id="headBackground">
        <div id="logo">urlist</div>
        <div id="userArea">Olá, <span id="userName"><?php echo $user->getNome(); ?></span></div>
    </div>

    <div id="corpo">
        <div id="addNovoContatoArea">
            <button id="addContato" onclick="mostrarRegistro()">Adicionar um novo contato</button>
        </div>

        <div id="addContatoDiv">
            <div id="headerDivContato">
                <p>Adicionar contato</p>
                <div onclick="sairRegistro()" id="sairContatoDiv">X</div>
            </div>

            <div id="areaFormContato">
                <form action="home.php" method="post">
                    <p class="labelInput">Nome: </p>
                    <input type="text" name="nome" class="InputContato">

                    <p class="labelInput">Email: </p>
                    <input type="email" name="email" class="InputContato">
                    
                    <p class="labelInput">Telefone: </p>
                    <input type="text" name="telefone" class="InputContato" required="required">

                    <input type="submit" id="submitBtnContato" value="Adicionar">

                    <div id="cancelarBtnContato" onclick="sairRegistro()">Cancelar</div>
                </form>

                
            </div>
        </div>


        <div id="areacontatos">
            <?php foreach($sql as $dados){?>
                <div class="contactArea">
                    <div class="contactImage"></div>
                    <div class="contactName"><?php echo $dados['nome'];  ?></div>
                    <div class="contactNumber"><?php echo $dados['telefone'];  ?></div>
                    <div class="contactEmail"><?php echo $dados['email']; ?></div>
                    <div class="contactButtons">
                    <div id="zap">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $dados['telefone'];?>" id='zap' target="_blank">Mensagem</a>
                    </div>
                        <button>email</button>
                        <button>mudar dados</button>
                    </div>
                </div>
            <?php } ?>
              
        </div>

    </div>
    
</body>
</html>