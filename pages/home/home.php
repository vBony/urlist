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
    <div id="lastHeadBackground">
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

                <input class="defaultBtnEnviar ConfigsUser" type="submit" value="Enviar">
                <div class="defaultCancelarBtn ConfigsUser" id="cancelarBtnConfigUser">Cancelar</div>
            </form>
        </div>

    </div>

    <div id="lastCorpo">
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
                    <tbody id="tableContatos">

                        <?php foreach($sql as $dados){?>
                                <tr id="<?php echo $dados['id']; ?>" class="rowsContact">
                                    <th scope="row" class="contentLista" id="userNameArea">
                                        <div class="userName" id="userDataName_<?php echo $dados['id']; ?>"> <?php echo $dados['nome'];  ?></div>
                                        <input type="text" name="inputNome" id="inputNome_<?php echo $dados['id']; ?>" class="input">
                                    </th>

                                    <td class="contentLista" id="userNumTelefoneArea"> 
                                        <div class="userNumTelefone" id="userDataTelefone_<?php echo $dados['id']; ?>"><?php echo $dados['telefone'];  ?></div>
                                        <input type="text" name="inputTelefone" id="inputTelefone_<?php echo $dados['id']; ?>" class="input">
                                    </td>

                                    <td class="contentLista" id="userEmailArea"> 
                                        <div class="userEmail" id="userDataEmail_<?php echo $dados['id']; ?>"><?php echo $dados['email']; ?></div>
                                        <input type="email" name="inputEmail" id="inputEmail_<?php echo $dados['id']; ?>" class="input">
                                    </td>

                                    <td class="contentLista" id="Tdoptions">
                                        <div id="zap" onclick="zapRedirect()" class="options zap_<?php echo $dados['id']; ?>">
                                            <a href="https://api.whatsapp.com/send?phone=<?php echo $dados['telefone']?>" target="_blank"><img src="../../images/whatsapp.png" alt="" title="Conversar no Whatsapp"></a>
                                        </div>
                                        
                                        <div id="delete" class="options delete_<?php echo $dados['id']; ?>">
                                            <img src="../../images/delete.png" alt="Deletar" title="Deletar este contato" class="deleteContact" data-id="<?php echo $dados['id']?>">
                                        </div>
                                        
                                        <div id="editar" class="options delete_<?php echo $dados['id']; ?>">
                                            <img src="../../images/edit.png" alt="Editar" title="Editar este contato" class="editContato">
                                        </div>

                                        <input type="submit" value="Salvar" class="btnAttContato" id="submit_<?php echo $dados['id']; ?>">
                                        <div class="defaultCancelarBtn cancelarBtn_<?php echo $dados['id']; ?> cancelarBtnGlobal" id="btnAttContatoCancelar"  data-id="<?php echo $dados['id']; ?>">Cancelar</div>
                                    </td>
                                </tr>
                        <?php } ?>

                    </tbody>
                </table>

                    
            </div>
            
            <?php if($_GET['events'] == "falha-alteracaocontausuario"){ ?>

                <div class="alertFalha-UserconfigsWindow">
                    
                </div>

            <?php } ?>

        </div>
    </div>

    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../scripts/home.js"></script>
    
</body>
</html>