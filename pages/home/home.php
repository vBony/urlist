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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div id="headBackground">
        <div id="logo">urlist</div>
        <div  id="userArea">
            <p>Olá,  <span id="userName"><?php echo $user->getNome(); ?></span></p>
            <div id="UserOptions">
                <span id="userConfigs" onclick="mostrarConfigUsuario()">Configurações</span>
                <span>|</span>
                <a href="logout.php" id="userExit">Sair</a>
            </div>
        </div>
        
    </div>

    <div id="windowUserConfigs">

    </div>

    <div id="corpo">
        <div id="addNovoContatoArea">
            <button id="addContato" onclick="mostrarRegistro()">Adicionar um novo contato</button>
        </div>

        <div id="windowUserConfigs">

        </div>

        

        <div id="addContatoDiv">
            <div id="headerDivContato">
                <p id="txtHeader">Adicionar contato</p>
                <div onclick="sairRegistro()" id="sairContatoDiv">&times;</div>
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
            <table class="table table-hover">
                <thead>
                    <tr class="bg-primary" id="headerLista">
                        <th scope="col">Nome</th>
                        <th scope="col">Nº de telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <?php foreach($sql as $dados){?>
                    <tbody id="tableContatos">
                        <th scope="row" class="contentLista"> <?php echo $dados['nome'];  ?> </th>

                        <td class="contentLista"> <?php echo $dados['telefone'];  ?> </td>

                        <td class="contentLista"> <?php echo $dados['email']; ?> </td>

                        <td class="contentLista">
                            <div id="zap" onclick="zapRedirect()">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $dados['telefone']?>" target="_blank"><img src="../../images/whatsapp.png" alt=""></a>
                            </div>
                        </td>
                        
                    </tbody>
                <?php } ?>
            </table>
                
        </div>

    </div>
    
</body>
</html>