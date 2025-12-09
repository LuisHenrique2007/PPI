<?php
include("conect.php");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die ("Você não pode acessar esta página porque 
    não está logado. <p> <a href=\"index.php\">ENTRAR</a></p>");
} else {
    if(isset($_SERVER['QUERY_STRING'])){
    $sql="UPDATE aluno SET ". $_SERVER['QUERY_STRING'];
    $notas=$conectar->query($sql);


    $sql="SELECT * FROM aluno WHERE id=".$_SESSION['id'];
    $notas=$conectar->query($sql);
    $aluno=$notas->fetch_assoc();
    $_SESSION['nvocabulary']=$aluno['nvocabulary'];
    $_SESSION['ngrammar']=$aluno['ngrammar'];
    $_SESSION['nreading']=$aluno['nreading'];
}}
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
            <a href="vocabulary.html">Vocabulary</a> <div>notaV=<?php echo $_SESSION['nvocabulary'];?><div>
            <a href="grammar.html">Grammar</a><div>notaG=<?php echo $_SESSION['ngrammar']?></div>
            <a href="reading.html">Reading</a><div>notaR=<?php echo $_SESSION['nreading'];?></div>
        </div>
    </main>
</body>

</html>