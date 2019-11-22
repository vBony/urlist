<?php
session_start();
require "assets/classes/User.class.php";

if(isset($_SESSION['login'])){  //Se o usuário já estiver logado o mesmo é redirecionado pra pagina principal
    header("Location: pages/home/home.php");
}else{

    //Get's para interação com o usuário
    if(!isset($_GET['sts']) && empty($_GET['sts'])){
        $_GET['sts'] = "none";
    }

    if(!isset($_GET['login']) && empty($_GET['login'])){
        $_GET['login'] = "none";
    }

    $user = new User();

    //Efetuando o login
    if(isset($_POST['email']) && !empty($_POST['email'])){

        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $user->logarUsuario($email, $senha);

        if($user->logarUsuario($email, $senha) == false){
            $_GET['login'] = "false";
        }
}

}
?>