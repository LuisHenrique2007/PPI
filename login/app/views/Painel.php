<?php
include ("Protect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    bem-vindo ao painel, <?php echo $_SESSION['nome'];?>
    <p><a href="Logout.php">Sair</a></p>
</body>
</html>