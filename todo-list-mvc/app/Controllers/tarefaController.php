<?php
require_once __DIR__ . '/../models/tarefa.php';

class TarefaController {
    private $tarefaModel; 

    public function __construct(){
        //objeto para fazer a relação com o backend
        $this->tarefaModel = new Tarefa(); 
    }


    public function criar(){
        //cria uma nova tarefa se a descrição existe
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
            $this->tarefaModel->criar($_POST['descricao']); 
            
        }
        //essa parte só cria um vetor tarefas e lista
        $tarefas = $this->tarefaModel->listarAtivas();
        include __DIR__ . "/../views/Listar.php";
    }

    public function excluir(){
        //exclui
        if(isset($_GET['delete'])){
            $this->tarefaModel->excluir($_GET['delete']); 
        }
        //essa parte só cria um vetor tarefas e lista
        $tarefas = $this->tarefaModel->listarAtivas();
        include __DIR__ . "/../views/Listar.php";
    }

    public function editar() {
        //edita uma tarefa buscada pelo id e vai pro editar tarefas
        if (isset($_GET['id'])) {
            $tarefa = $this->tarefaModel->buscarPorId($_GET['id']);
            include __DIR__ . "/../views/Editar.php";
        }
    }

    public function atualizar() {
        //exclui uma tarefa e cria outra do site
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->criar($_POST['descricao']);
            $this->tarefaModel->excluir($_POST['id']);
        }
        //edita uma tarefa buscada pelo id e vai pro editar tarefas
        $tarefas = $this->tarefaModel->listarAtivas();
        include __DIR__ . "/../views/Listar.php";
    }
    public function telaIndex(){
        require_once __DIR__ ."/../views/Login.php";
    }
    public function login(){
    //testa se não tem email e senha
    if (!isset($_POST['email']) || !isset($_POST['senha'])) {
        if (strlen($_POST['email']) == 0) {
            echo "Preencha seu email";
        } else if (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        }
    } else {
        //senão, veremos se o login é válido
        $TestarLogin = $this->tarefaModel->login($_POST['email'], $_POST['senha']);

        if (isset($TestarLogin)) {
            //se sim, entrar no listar.php com uma sessão
            $tarefas = $this->tarefaModel->listarAtivas(); 
            include __DIR__ . "/../views/Listar.php";
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION['id'])) {
                die("Você não pode acessar esta página porque 
            não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
            }
        } else {
            echo "falha ao logar";
        }
    }
}
    public function cadastrar(){
        //se existir as credenciais, então testa se existe alguém já assim
        if(isset($_POST['nome']) && isset($_POST['senha'])){
            $lista_usuarios = $this->tarefaModel->cadastro($_POST['nome'],$_POST['senha']);
            if($lista_usuarios->num_rows>0){
                //se existe, o sistema mostra isso:
                echo "já existe alguém com este nome";
                require_once __DIR__. "/../views/Cadastro.php";
            }else{
                //senão cria um novo cara e vai ao login
                $usuarioNovo=$this->tarefaModel->inserir($_POST['nome'],$_POST['senha']);
                header("Location: Index.php");
            }
            }
            
    }
    public function direcaoCadastro(){
        require_once __DIR__ ."/../views/Cadastro.php";
    }

}


?>