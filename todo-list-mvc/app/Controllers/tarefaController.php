<?php
require_once __DIR__ . '/../Models/tarefa.php';
class TarefaController{
    private $tarefaModel;
    public function __construct(){
        $this->tarefaModel=new Tarefa();
    }
    public function index(){
        $tarefas = $this->tarefaModel->listar();
        include __DIR__ . '/../views/index.php';
    }

    ## Criar
    public function criar(){ 
        if(isset($_POST['descricao']) && !empty(trim($_POST('descricao')))){
            $this->tarefaModel->criar($_POST['descricao']);
        }
        header("Location:index.php");
    }
    ## Excluir
    public function excluir(){
        if(isset($_GET['delete'])){
            $this->tarefaModel->excluir($_GET['delete']);
            
        }
    }
}
?>