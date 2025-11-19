<?php
include("conect.php");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die ("Você não pode acessar esta página porque 
    não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
} else{
        $id = $_SESSION["id"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Learning Site</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Welcome to English Learning</h1>
    </header>
    <main>
        <h2>Select a Subject to Begin</h2>
        <div class="subject-list">
            <img class="logo" src="logo.jpeg" width="50px">
            <div class="da">birdão</div>
            <a href="vocabulary.html">Vocabulary</a>
            <a href="grammar.html">Grammar</a>
            <a href="reading.html">Reading</a>
        </div>
    </main>
</body>

</html>