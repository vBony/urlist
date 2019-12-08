<?php
session_start();
ini_set('default_charset','UTF-8');
include "homeConfig.php";

if(!isset($_GET['events'])){
    $_GET['events'] = "none";
}

if(isset($_GET['sts'])){
    unset($_GET['sts']);
}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="headBackground">
        <div id="logo">urlist</div>
        <div  id="userArea">
            <p>Olá,  <span id="userName"><?php echo $userName; ?></span></p>
            <div id="UserOptions">
                <span id="userConfigs">Configurações</span>
                <span>|</span>
                <a href="logout.php" id="userExit">Sair</a>
            </div>
        </div>
        
    </div>

    <div id="windowUserConfigs">
        <div id="windowUserConfigsHeader">
            <div id="configsHeaderTitle">Configurações da conta</div>
            <div id="configsHeaderExitButton">&times;</div>
        </div>

        <div id="windowUserConfigsBody">
            <form action="" method="post">
                <p class="labelInput" id="nomeUsuarioUserConfigs">Nome: </p>
                <input type="text" name="nomeUsuario" class="InputContato">

                <p class="labelInput">Email: </p>
                <input type="email" name="emailUsuario" class="InputContato">
                <div id="warningUserConfigs">
                    <p class="labelInput" id="labelUserWarning1">Senha atual: </p>
                    <input type="password" name="senhaAtualUsuario" class="InputContato" id="senhaUserConfigs1">

                    <p class="labelInput" id="labelUserWarning2" >Nova senha: </p>
                    <input type="password" name="novaSenha" class="InputContato" id="senhaUserConfigs2">
                </div>

                <input class="defaultBtnEnviar" type="submit" value="Enviar">
                <div class="defaultCancelarBtn ConfigsUser" id="cancelarBtnConfigUser">Cancelar</div>
            </form>
        </div>

    </div>

    <div id="corpo">
        <div id="addNovoContatoArea">
            <button id="addContato">Adicionar um novo contato</button>
        </div>

        <div id="windowUserConfigs">

        </div>

        

        <div id="addContatoDiv">
            <div id="headerDivContato">
                <div id="txtHeader">Adicionar contato</div>
                <div id="sairContatoDiv">&times;</div>
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

                    <div class="defaultCancelarBtn" id="cancelarBtnAddContato">Cancelar</div>
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
        
        <?php if($_GET['events'] == "falha-alteracaocontausuario"){ ?>

            <div class="alertFalha-UserconfigsWindow">
                
            </div>

        <?php } ?>

    </div>

    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../scripts/home.js"></script>
    
</body>
</html>