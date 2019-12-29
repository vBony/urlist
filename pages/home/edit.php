<?php
session_start();
try{
    $pdo = new PDO("mysql:dbname=urlist;host=localhost", "jackvini2", "Sacramento1@");

}catch(PDOException $e){
    echo "Falha ao conectar:".$e->getMessage();
}

//Dados que veio da requisição
$userid = $_SESSION['id'];
$idContato = $_POST['id'];
$nomeContato = $_POST['nome'];
$emailContato = $_POST['email'];
$telefoneContato = $_POST['telefone'];

//Atualizando o Contato
$sql = "UPDATE contatos
        SET
            contatos.nome = :nome, 
            contatos.email = :email,
            telefone = :telefone
        WHERE id = :id AND userid = :userid";

$sql = $pdo->prepare($sql);
$sql->bindValue(":nome", $nomeContato);
$sql->bindValue(":email", $emailContato);
$sql->bindValue(":telefone", $telefoneContato);
$sql->bindValue(":id", $idContato);
$sql->bindValue(":userid", $userid);
$sql->execute();

//Puxando o contato para mandar a resposta
$sql = "SELECT 
            contatos.nome,
            contatos.email,
            telefone
        FROM contatos
            WHERE
                id = :id
                AND
                userid = :userid";

$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $idContato);
$sql->bindValue(":userid", $userid);
$sql->execute();

//Mandando a resposta
if($sql->rowCount() > 0){
    $resultado = $sql->fetch();
    $request = array("status" => "success" ,
                    "id" => $idContato,
                    "nome" => $resultado['nome'], 
                    "email" => $resultado['email'],
                    "telefone" => $resultado['telefone']);

    echo json_encode($request);
}
?>