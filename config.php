<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "sistema_chapa";

$conexao = new mysqli($servidor, $usuario, $senha, $nomeBanco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$sql = "SELECT * FROM chapas";
$result = $conexao->query($sql);

?>

