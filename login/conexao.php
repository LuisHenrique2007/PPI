<?php

$host="localhost";
$usuario="root";
$senha='';
$banco="login";

$conn=new mysqli($host,$usuario,$senha,$banco);

if($conn->connect_error){
    die ('não deu certo :(');
}
?>