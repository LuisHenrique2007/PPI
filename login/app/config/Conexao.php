<?php
class Conexao{
private $host="localhost";
private $usuario="root";
private $senha='';
private $banco="login";

public $conn;
//conectar com o banco
public function conectar(){
    $this->conn =new mysqli($this->host,$this->usuario,$this->senha,$this->banco);
//se não conseguir conectar ao banco aparece o die
if($this->conn->connect_error){
    die ('não deu certo conectar ao banco :(');
}
return $this->conn;
}
}
?>