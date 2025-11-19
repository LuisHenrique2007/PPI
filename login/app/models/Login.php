<?php
    require_once __DIR__ . "/../config/Conexao.php";
        
    class Login{
            private $conn; 
            public function __construct(){ 
            $db=new Conexao();
            $this->conn=$db->conectar();
        }
        public function login(){
            if(isset($_POST['email']) || isset($_POST['senha'])){
                if(strlen($_POST['email']) == 0){
                    echo "Preencha seu email" ;
                }
                else if(strlen($_POST['senha']) == 0){
                    echo "Preencha sua senha"; 
                }
                   
                else{
                    $email = $this->conn->real_escape_string($_POST['email']);
                    $senha = $this->conn->real_escape_string($_POST['senha']); 
            
                    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            
                    $lista_usuarios = $this->conn->query($sql); 
                    $quantidade  = $lista_usuarios->num_rows;
                    if($quantidade == 1){
                        $usuario = $lista_usuarios->fetch_assoc(); 
                        if(!isset($_SESSION)){
                            session_start(); 
                        }
                        $_SESSION['id'] = $usuario['id']; 
                        $_SESSION['nome'] = $usuario['nome'];

                        return $_SESSION['id'];
                    }else{
                        return null;
                    }
        }
    }}}
?>