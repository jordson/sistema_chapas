<?php
session_start();
require_once 'config.php';

if ($_SESSION['usuario_tipo'] !== 'adm') {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM chapas";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <h1 class="my-4">Painel Administrador</h1>
    <p>Bem-vindo ao painel administrativo! Aqui você pode gerenciar os produtos cadastrados.</p>
    <a href="cadastro_produto.php" class="btn btn-primary">Cadastrar Produto</a>
    <table class="table">
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
                    <a href="editar_chapa.php?id=<?php echo $chapa['id']; ?>" class="btn btn-warning">Editar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="sair.php" class="btn btn-secondary">Sair</a>
</div>
</body>
</html>
