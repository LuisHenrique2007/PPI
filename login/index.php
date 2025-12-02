<?php
require_once __DIR__ . '/app/controllers/Controlador.php';
$controlador=new Controlador();

$action=$_GET['action'] ?? 'index';
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