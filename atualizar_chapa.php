<?php
// Verifique se o usuário está logado como administrador
session_start();
require_once 'config.php';

// Verifique se os dados do formulário foram submetidos via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $peso = $_POST['peso'];

    // Execute uma consulta SQL para atualizar os dados da chapa
    $sql = "UPDATE chapas SET nome = ?, peso = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sdi', $nome, $peso, $id);
    $stmt->execute();

    // Redirecione de volta para a lista de chapas
    header('Location: lista_chapa.php');
    exit;
} else {
    header('Location: lista_chapa.php');
    exit;
}
?>
