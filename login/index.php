<?php
//Herdar a classe do Controlador.php
require_once __DIR__ . '/app/controllers/Controlador.php';
//Criar um novo objeto, encapsulando suas funções
$controlador=new Controlador();
//Capturar do formulário da 
$action=$_GET['action'] ?? 'index';
//chama as funções baseadas no que recebe
switch($action){
    case 'login':
        $controlador->login();
        break;
    case 'desligar':
        $controlador->desligar();
        break;
    default:
        $controlador->entrar();
    break;
}
?>