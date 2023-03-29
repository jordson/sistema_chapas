<?php
require_once 'config.php';

// Verifique se o usuário está logado como administrador
//if (!isset($_SESSION['usuarios']) || $_SESSION['usuarios']['nivel'] !== 'adm') {
//    header('Location: login.php');
//    exit;
//}

// Execute uma consulta SQL para recuperar todas as chapas
$sql = "SELECT * FROM chapas";
$result = $conexao->query($sql);

// Verifique se há alguma chapa cadastrada
if ($result->num_rows === 0) {
    echo 'Nenhuma chapa encontrada.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Chapas</title>
</head>
<body>
<h1>Lista de Chapas</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Peso</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($chapa = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $chapa['id']; ?></td>
            <td><?php echo $chapa['nome']; ?></td>
            <td><?php echo $chapa['peso']; ?></td>
            <td>
                <a href="editar_chapa.php?id=<?php echo $chapa['id']; ?>">Editar</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
