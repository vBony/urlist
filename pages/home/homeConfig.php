<?php
include "../../assets/classes/User.class.php";
include "../../assets/classes/contatos.class.php";
ini_set('default_charset','UTF-8');

if($_SESSION['login'] != "sim"){    //Protegendo se caso o usuário tentar acessar a pagina Home sem efetuar o login, se sim ele é direcionado para a pagina não logado
    header("Location: naoLogado.html");
}


//Definindo um GET para manipular as janelas de interação
//entre o backend e o usuario
$_GET['events'] = "none"; 

//Criando a classe do usuario
$user = new User($_SESSION['id']);

//Filtrando somente o nome do sobrenome
$explode = explode(" ", $user->getNome());
$userName = $explode[0];

$contatos = new Contatos();

//Puxando os contatos do usuario por aqui (TEMPORARIO)
try{
    $pdo = new PDO("mysql:dbname=urlist;host=localhost", "jackvini2", "Sacramento1@");
}catch(PDOException $e){
    echo "Erro ao tentar se conectar, motivo: ".$e->getMessage();
}

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    $sql = "SELECT * FROM contatos WHERE userid = :id";

    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $_SESSION['id']);
    $sql->execute();
}else{

}

//Salvando Contatos:
if(isset($_POST['telefone']) && !empty($_POST['telefone'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $foto = "soon";

    $contatos->setUserId($_SESSION['id']);
    $contatos->setNome($nome);
    $contatos->setTelefone($telefone);
    $contatos->setEmail($email);
    $contatos->setFoto($foto);
    $contatos->salvarContato();

    header("Refresh:0");
}

//Configurações do usuário
if(!empty($_POST['nomeUsuario']) || !empty($_POST['emailUsuario']) || !empty($_POST['senhaAtualUsuario'])){
    $novaSenhaUsuario = md5($_POST['novaSenha']);
    $senhaAtualUsuario = md5($_POST['senhaAtualUsuario']);

    if($user->verificarSenha($_SESSION['id'], $senhaAtualUsuario) === true){
        if(!empty($_POST['nomeUsuario'])){  //Condição para não enviar o formulario com o nome vazio mas sim mantendo o mesmo nome.
            $user->setNome($_POST['nomeUsuario']);
        }

        if(!empty($_POST['emailUsuario'])){
            $user->setEmail($_POST['emailUsuario']);
        }

        $user->setSenha($novaSenhaUsuario);
        $user->salvarOuCriar($_SESSION['id']);
        header("Refresh: 0");
    }else{
        $_GET['events'] = "falha-alteracaocontausuario";
    }
}


?>