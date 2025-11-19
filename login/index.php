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
    case "dentro":
        $controlador->existeSessao();
    default:
        $controlador->entrar();
    break;
}
?>