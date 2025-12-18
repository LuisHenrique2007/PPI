<?php
require_once __DIR__ . '/../models/tarefa.php';
class TarefaController {
    private $tarefaModel; 

    public function __construct(){
        $this->tarefaModel = new Tarefa(); 
    }


    public function criar(){
        if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
            $this->tarefaModel->criar($_POST['descricao']); 
        }
        header("Location: index.php"); 
    }

    public function excluir(){
        if(isset($_GET['delete'])){
            $this->tarefaModel->excluir($_GET['delete']); 
        }
        header("Location: index.php"); 
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $tarefa = $this->tarefaModel->buscarPorId($_GET['id']);
            include __DIR__ . '/../views/editar.php';
        }
    }

    public function atualizar() {
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->criar($_POST['descricao']);
            $this->tarefaModel->excluir($_POST['id']);
        }
        header("Location: index.php");
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
            include __DIR__ . "/../views/Editar.php";
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
        if(isset($_POST['email']) && $_POST['senha']){

            $lista_usuarios = $this->tarefaModel->cadastro($_POST['email'],$_POST['senha']);

            if($lista_usuarios->num_rows>0){
                echo "já existe alguém com este nome";
            }else{
                $usuarioNovo=$this->tarefaModel->inserir($_POST['email'],$_POST['senha']);
                require_once __DIR__ . "/../views/Login.php";
            }
            }
            
    }
    public function direcaoCadastro(){
        require_once __DIR__ ."/../views/Cadastro.php";
    }

}


?>