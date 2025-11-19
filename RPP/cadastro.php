<?php include("conect.php");
                if(!isset($_SESSION)){
                    session_start();
                }
                if(isset($_POST['nome']) && $_POST['senha'] && $_POST['telefone']){
                $nome = $conectar->real_escape_string($_POST['nome']);
                $senha = $conectar->real_escape_string($_POST['senha']); 
                $telefone=$conectar->real_escape_string($_POST['telefone']);

                $sql = "SELECT * FROM aluno WHERE nome = '$nome' AND senha = $senha AND telefone='$telefone'";

                $lista_usuarios = $conectar->query($sql);

                if($lista_usuarios->num_rows>0){
                    echo "já existe alguém com este nome";
                }else{
                    $sql="INSERT into aluno(nome,senha,telefone,nvocabulary,ngrammar,nreading) values('$nome',$senha,'$telefone',0,0,0)";
                    $usuarioNovo=$conectar->query($sql);
                    header("Location: index.php");
                }
                }
                
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="a.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APRENDENDO INGLÊS-cadastro</title>
</head>
<body>
    <div id="pa">birdão</div>
        <form action="" method="POST">
            <div class="adsfa"><h1>cadastro</h1>
            <label for="Nome" class="nome">Nome:</label>
            <input type="text" id="Nome" class="nome" name="nome" required />

            <label for="Tel" class="t">Telefone:</label>
            <input type="tel" class="t" id="Tel"  pattern="[0-9]{5}-[0-9]{4}" name="telefone" required placeholder="00000-0000"/>

            <label for="i" class="i">Senha:</label>
            <input type="password" id="i" class="i" name="senha" required />
           
            <input type="submit" value="cadastrar" class="a"></div>
            <img src="logo.jpeg" class="e">
        </form>
</body>
</html>