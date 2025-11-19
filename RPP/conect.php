<?php
$host="localhost";
$usuario="root";
$senha="";
$banco="sala";

$conectar=new mysqli($host,$usuario,$senha,$banco);

if($conectar->connect_error){
    die("não deu pra conectar ao banco de dados");
}

?>