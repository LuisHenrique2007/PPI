<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>painel</title>
</head>
<body>
    <h1>bem-vindo ao painel,<?php echo $_SESSION['nome'];
    ?></h1> 
    <p><a href="Index.php?action=desligar">Sair</a></p>
</body>
</html>