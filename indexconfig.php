<?php
require "assets/classes/classes.php";

$user = new User();

if(isset($_POST['email']) && !empty($_POST['email'])){

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $user->logarUsuario($email, $senha);
}


?>