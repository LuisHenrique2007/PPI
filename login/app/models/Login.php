<?php
    require_once __DIR__ . "/../config/Conexao.php";
        //molde do objeto login
    class Login{
            private $conn; 
            public function __construct(){ 
            $db=new Conexao();
            $this->conn=$db->conectar();
        }
        public function login($eml,$sha){
                    $email = $this->conn->real_escape_string($eml);
                    $senha = $this->conn->real_escape_string($sha); 
                    //login testa se essa sintaxe sql chama algo na tabela
                    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

                    $lista_usuarios = $this->conn->query($sql); 
                    //se chamar, então começa uma sessão com nome e id, voltando id
                    $quantidade  = $lista_usuarios->num_rows;
                    if($quantidade > 0){
                        $usuario = $lista_usuarios->fetch_assoc(); 
                        if(!isset($_SESSION)){
                            session_start(); 
                        }
                        $_SESSION['id'] = $usuario['id']; 
                        $_SESSION['nome'] = $usuario['nome'];
                        
                        return $_SESSION['id'];
                    }else{
                        //senão volta nada
                        return null;
                    }
        }}
?>