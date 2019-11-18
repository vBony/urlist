<?php
ini_set('default_charset','UTF-8');
class User{
    private $pdo;

    private $id;
    private $nome;
    private $email;
    private $ncelular;
    private $senha;
    private $foto;

    /*No construct eu faço a conexão com o banco e uma condicional que se houver um parametro (ID) no construct
    logo é puxado algum usuario pelo id e definindo as propriedades do objeto. */

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

                //passando o resultado para as propriedades
                $this->id = $data['id'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->ncelular = $data['ncelular'];
                $this->senha = $data['senha'];
                $this->foto = $data['foto'];
            }
        }
        
    }


    /* Aqui é definido os Getters(Mostrar os dados das propriedades privadas do objeto) 
    e os Setters (definir um valor para os mesmos).*/
    public function getID(){ // coloquei um set para o ID por motivos óbvios.
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

    /*Ccriei uma função que se caso a propriedade ID do objeto estiver vazia, significa
    que o usuário não existe, então é criado um usuario novo. Caso contrario é feito as
    as alterações dos dados e enviado pro banco de dados.*/
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

            header("Location: ../../index.php?sts=scs");
        }
    }

    /*Função para verificar se o usuario que está tentando logar existe,
    se sim o id do mesmo é passado para uma Session para usar no construct
    ou em outros casos no futuro.*/
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

            return true;
        }else{
            return false;
        }
    }

   
}
?>