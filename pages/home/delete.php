<?php
session_start();
try{
    $pdo = new PDO("mysql:dbname=urlist;host=localhost", "jackvini2", "Sacramento1@");
    $id = json_decode($_POST['id']);
    $request = array("status" => "", "id" => "$id");
    $user = $_SESSION['id'];

    $sql = "DELETE FROM contatos WHERE id = :id AND userid = :user";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":user", $user);
    $sql->execute();


    if($sql->rowCount() > 0){
        $request['status'] = "done";
        echo json_encode($request);
    }else{
        $request['status'] = "fail";
        echo json_encode($request);
        echo $user;
    }

}catch(PDOexception $e){
    echo "Erro: "+$e->getMessage();
}




?>
