<?php
header('Content-Type: text/html; charset=utf-8');
class User{
    private $pdo;

    private $id;
    private $nome;
    private $email;
    private $ncelular;
    private $senha;
    private $foto;

    public function __construct($id = ''){ //Tornado a passagem de parametro opcional, pois caso o usuario não existir
        try{
            $this->pdo = new PDO("mysql:dbname=urlist;host=localhost", "jackvini2", "Sacramento1@");
        }catch(PDOException $e){
            echo "Erro ao conectar ao banco de dados. <br>".$e->getMessage();
        }

        if(!empty($id)){

            $sql = "SELECT * FROM users WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch();

                //passando o resultado para os objetos
                $this->id = $data['id'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->ncelular = $data['ncelular'];
                $this->senha = $data['senha'];
                $this->foto = $data['foto'];
            }
        }
        
    }



    public function getID(){ //Não é recomendado SETAR um ID
        return $this->id;
    }

    public function setNome($n){
        $this->nome = $n;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($e){
        $this->email = $e;
    }

    public function getEmail(){
        return $this->email;
    }


    public function setNcelular($nc){
        $this->ncelular = $nc;
    }

    public function getNcelular(){
        return $this->ncelular;
    }


    public function setSenha($s){ //Não coloquei um get para senha porque não faz sentido getar uma senha criptografada
        $this->senha = $s;
    }


    public function setFoto($f){
        $this->foto = $f;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function SalvarOuCriar(){
        if(!empty($this->id)){

            $sql = "UPDATE users SET 
                    nome = :nome,
                    email = :email,
                    senha = :senha,
                    ncelular = :ncelular,
                    foto = :foto";
            
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->bindValue(":ncelular", $this->ncelular);
            $sql->bindValue(":foto", $this->foto);
            $sql->execute();

        }else{
            $sql = "INSERT INTO users(id, nome, email, ncelular, senha, foto) VALUES (NULL,:nome,:email,:ncelular,:senha,:foto)";
            
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->bindValue(":ncelular", $this->ncelular);
            $sql->bindValue(":foto", $this->foto);
            $sql->execute();

            echo "Usuario criado com sucesso!";
        }
    }

    public function logarUsuario($e, $s){
        $sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $e);
        $sql->bindValue(":senha", $s);
        $sql->execute();

        if($sql->rowCount()>0){
            session_start();
            $dados = array();
            $dados = $sql->fetch();
            $_SESSION['id'] = $dados['id'];
            header("Location: pages/home/home.php");
        }
    }

   
}
?>