<?php
include ("Index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>painel</title>
</head>
<body>
    <h1>bem-vindo ao painel,</h1> <?php echo $_SESSION['nome'];?>
    <p><a href="principal.php">Sair</a></p>
</body>
</html>