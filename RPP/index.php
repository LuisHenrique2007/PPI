<?php
            include("conect.php");
                if(!isset($_SESSION)){
                    session_start();
                }
                if(isset($_GET['nome']) && isset($_GET['senha']) && isset($_GET['telefone'])){
                $nome = $conectar->real_escape_string($_GET['nome']);
                $senha = $conectar->real_escape_string($_GET['senha']); 
                $telefone=$conectar->real_escape_string($_GET['telefone']);

                $sql = "SELECT * FROM aluno WHERE nome = '$nome' AND senha = $senha AND telefone='$telefone'";

                $lista_usuarios = $conectar->query($sql);

                if($lista_usuarios->num_rows>0){
                    $aluno=$lista_usuarios->fetch_assoc();
                    $_SESSION['id']=$aluno['id'];
                    header("Location: principal.php");
                }else{
                    echo "seu login não foi encontrado";
                }
                }
                
            ?>
            <!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="a.css">
        <title>
            login
        </title>
    </head>
    <body>
        <div id="pa">birdão</div>
        <form action="" method="GET">
            <div class="adsfa"><h1>login</h1>
            <label for="Nome" class="nome">Nome:</label>
            <input type="text" id="Nome" class="nome" name="nome"required />

            <label for="Tel" class="t">Telefone:</label>
            <input type="tel" class="t" id="Tel"  pattern="[0-9]{5}-[0-9]{4}" name="telefone" required placeholder="00000-0000"/>

            <label for="i" class="i">Senha:</label>
            <input type="password" id="i" class="i" name="senha" required />
            <input type="submit" value="logar" class="a">
</div>
            <a href="cadastro.php">cadastrar</a>
            <img src="logo.jpeg">
            <img src="logo.jpeg" class="e">
        </form>
    </body>
</html>