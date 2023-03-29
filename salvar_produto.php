<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$nomeProduto = $_POST['nomeProduto'];
$pesoProduto = $_POST['pesoProduto'];
$usuario_id = $_SESSION['usuario_id'];
$nomeUsuario = $_POST['nomeUsuario'];

$sql = "INSERT INTO chapas (nome, peso, usuario_id, nome_usuario) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sdss", $nomeProduto, $pesoProduto, $usuario_id, $nomeUsuario);


if ($stmt->execute()) {
    echo "Chapa cadastrada com sucesso!";
    if ($_SESSION['usuario_tipo'] === 'adm') {
        echo "<br><a href='painel_adm.php'>Voltar ao painel</a>";
    } else {
        echo "<br><a href='painel_publico.php'>Voltar ao painel</a>";
    }
} else {
    echo "Erro ao cadastrar o produto: " . $conexao->error;
    echo "<br><a href='cadastro_produto.php'>Tentar novamente</a>";
}
?>
