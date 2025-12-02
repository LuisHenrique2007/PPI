<?php
require_once __DIR__ . "/../models/Login.php";
class Controlador
{
    private $tarefaModel;
    public function __construct()
    {
        $this->tarefaModel = new Login();
    }

    public function login(){
        if (isset($_POST['email']) || isset($_POST['senha'])) {
            if (strlen($_POST['email']) == 0) {
                echo "Preencha seu email";
            } else if (strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            }
        } else {
            $TestarLogin = $this->tarefaModel->login($_POST['email'],$_POST['senha']);
        }
        if (isset($TestarLogin)) {
            include __DIR__ . "/../views/Painel.php";
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

    public function existeSessao(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['id'])) {
            die("Você não pode acessar esta página porque 
            não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
        }
    }

    public function desligar()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        header("Location:Index.php");
    }

    public function entrar()
    {
        include __DIR__ . "/../views/Principal.php";
    }

}

?>