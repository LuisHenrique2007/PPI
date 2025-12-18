<?php
//Se não existir sessão, começa a sessão para trabalhar com id dela depois
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    //se você não estiver logado, você loga
    die ("Você não pode acessar esta página porque 
    não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar tarefa</title>
    <style>
        body{
            background-color: aqua
        }
    </style>
</head>
<body>
    <h1>Editar tarefa</h1>

    <form action="index.php?action=atualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        <input type="text" name="descricao" value="<?php //isso coloca a descrição a mostra para editar
        echo htmlspecialchars($tarefa['descricao']); ?>" required>
        <button type="submit">Salvar</button>
    </form>

    <a href="index.php">Voltar</a>
</body>
</html>