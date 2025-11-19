<?php
require_once __DIR__ ."/../models/Login.php";
class Controlador{
    private $tarefaModel; 
    public function __construct(){
        $this->tarefaModel = new Login(); 
    }

    public function login(){
        $TestarLogin=$this->tarefaModel->login();
        if(isset($TestarLogin)){
        include __DIR__ . '/../views/Painel.php';
        }else {
            echo "falha ao logar";
        }
    }

    public function desligar(){   
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
        header("Location:Index.php");
    }

    public function entrar(){
        include __DIR__ . "/../views/Principal.php";
    }
    public function existeSessao() {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['id'])){
            die ("Você não pode acessar esta página porque 
            não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
        }
    }

}

?>