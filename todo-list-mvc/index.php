<?php
//Herdar a classe controladora do mvC
require_once __DIR__ . '/app/controllers/TarefaController.php';
//criar objeto tarefaControler
$controller = new TarefaController(); 
//armazena a ação dos formulários
$action = $_GET['action'] ?? 'index' ; 
//Chama as funções, baseadas no que recebe
switch ($action) {
    case 'criar':
        //cria nova tarefa
        $controller->criar();
        break;
    case 'excluir':
        //exclui tarefa
        $controller->excluir();
        break;
    case 'editar':
        //Vai pra página de edição
        $controller->editar();
        break;
    case 'atualizar':
        //Volta pra página de exibição de listas
        $controller->atualizar();
        break;
    case 'login':
        //LOGAR no site
        $controller->login();
        break;
    case 'cadastro':
        //vai ao cadastro
        $controller->direcaoCadastro();
        break;
    case 'cadastrar':
        //cadastra um novo usuário e volta a tela de login
        $controller->cadastrar();
        break;
    default:
        //Quando o usuário entrar, vai aparecer a tela de login
        $controller->telaIndex();
        break;
}

?>