<?php
class Contatos{
    private $pdo;

    private $userId;
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $foto;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=urlist;host=localhost", "jackvini2", "Sacramento1@");
        }catch(PDOException $e){
            echo "Erro ao tentar se conectar, motivo: ".$e->getMessage();
        }
    }

    public function setUserId($ui){
        $this->userId = $ui;
    }

    public function setNome($n){
        $this->nome = $n;
    }

    public function setEmail($e){
        $this->email = $e;
    }

    public function setTelefone($t){
        $this->telefone = $t;
    }

    public function setFoto($f){
        $this->foto = $f;
    }

    public function salvarContato(){
        if($this->verificarSeTelefoneExiste($this->telefone, $this->userId) == false){
            $sql = "INSERT INTO contatos(userid, id, nome, email, telefone, foto) VALUES (:userid, NULL, :nome, :email, :telefone, :foto)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":userid", $this->userId);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":telefone", $this->telefone);
            $sql->bindValue(":foto", $this->foto);
            $sql->execute();
        }else{
            return false;
        }
    }

    private function verificarSeTelefoneExiste($t, $ui){
        $sql = "SELECT * FROM contatos WHERE telefone = :telefone AND userid = :userid";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":telefone", $t);
        $sql->bindValue(":userid", $ui);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}


?>