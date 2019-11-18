<?php
require "assets/classes/User.class.php";

$user = new User();

if(isset($_POST['email']) && !empty($_POST['email'])){

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $user->logarUsuario($email, $senha);

    if($user->logarUsuario($email, $senha) == false){
        $_GET['login'] = "false";
    }
}


?>