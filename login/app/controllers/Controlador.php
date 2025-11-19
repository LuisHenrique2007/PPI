<?php
class Controlador{
    private $tarefaModel; 
    public function __construct(){
        $this->tarefaModel = new Tarefa(); 
    }

    

    public function atualizar() {
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->criar($_POST['descricao']);
            $this->tarefaModel->excluir($_POST['id']);
        }
        header("Location: index.php");
    }

}

?>