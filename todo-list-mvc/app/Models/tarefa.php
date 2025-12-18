<?php
require_once __DIR__ . '/../config/database.php';

class Tarefa{
    private $conn; 

    public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar(); 
    }

    ## Listar 

    public function listarAtivas(){
        $tarefas = [];
        $sql = "SELECT * FROM tarefas ORDER BY data_criacao DESC"; 
        $resultado = $this->conn->query($sql); 

        if($resultado->num_rows >0){
            while($row = $resultado->fetch_assoc()){
                $tarefas[] = $row; 
            }
        }

        return $tarefas;
    }
    ## Criar 

    public function criar($descricao){
        $descricao = $this->conn->real_escape_string($descricao); 
        $sql = "INSERT INTO tarefas (descricao) VALUES ('$descricao')"; 
        return $this->conn->query($sql); 
    }

    ## Exlcuir 

    public function excluir($id){
        $id = intval($id);
        $sql = "DELETE FROM tarefas WHERE id = $id"; 
        return $this->conn->query($sql); 
    }

    ## Editar
    public function editar($id, $descricao){
        $id = intval($id);
        $descricao = $this->conn->real_escape_string($descricao);
        $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id";
        return $this->conn->query($sql);
    }

    ## Buscar por ID (para preencher o formulário de edição)
    public function buscarPorId($id){
        $id = intval($id);
        $sql = "SELECT * FROM tarefas WHERE id = $id";
        $resultado = $this->conn->query($sql);
        return $resultado->fetch_assoc();
    }
    public function login($eml,$sha){
        $email = $this->conn->real_escape_string($eml);
        $senha = $this->conn->real_escape_string($sha); 
        //login testa se essa sintaxe sql chama algo na tabela
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND nome = '$senha'";

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
}
        ##testa se já existe alguém com essas credenciais
    public function cadastro($e,$s){
            $email = $this->conn->real_escape_string($e);
            $senha = $this->conn->real_escape_string($s); 
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND nome = '$senha'";
            return $this->conn->query($sql);
    }
    //cria um novo usuário
    public function inserir($email,$senha){
        $sql="INSERT INTO usuarios(email, nome) VALUES('$email','$senha')";
        return $this->conn->query($sql);
    }
}
    

?>