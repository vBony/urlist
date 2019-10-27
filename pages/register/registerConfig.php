<?php
require "../../assets/classes/classes.php";

$envio = new User();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $nome = ucwords(strtolower($_POST['nome']));
    $envio->setNome($nome);

    $telefone = $_POST['telefone'];
    $envio->setNcelular($telefone);

    $email = $_POST['email'];
    $envio->setEmail($email);

    $senha = md5($_POST['senha']);
    $envio->setSenha($senha);

    $foto = "../../images/user_img/default.png";
    $envio->setFoto($foto);

    $envio->SalvarOuCriar();

    // header("Location: ../../index.php?status=sucesso");
}

?>