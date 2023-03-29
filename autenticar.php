<?php
session_start();
require_once "config.php";

$nomeUsuario = $_POST['nomeUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];

$sql = "SELECT * FROM usuarios WHERE nome = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $nomeUsuario);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($usuario) {
    if ($senhaUsuario === $usuario['senha']) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_tipo'] = $usuario['user_type'];

        if ($usuario['user_type'] == 'adm') {
            header("Location: painel_adm.php");
        } else {
            header("Location: painel_publico.php");
        }
    } else {
        echo "Usuário ou senha inválidos.";
        echo "<br><a href='login.php'>Voltar</a>";
    }
} else {
    echo "Usuário ou senha inválidos.";
    echo "<br><a href='login.php'>Voltar</a>";
}

?>
