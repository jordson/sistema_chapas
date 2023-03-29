

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Público</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="my-4">Painel Público</h1>
    <p>Bem-vindo ao painel público! Aqui você pode visualizar as chapas cadastradas.</p>
    <a href="cadastro_produto.php" class="btn btn-primary">Cadastrar Produto</a>
    <a href="sair.php" class="btn btn-secondary">Sair</a>

    <?php
    require_once 'config.php';

    // verifica se a conexão com o banco de dados foi estabelecida corretamente
    if (!$conexao) {
        die("Falha ao conectar com o banco de dados: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM chapas";
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>Peso</th>";
        echo "<th>Responsável</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($chapa = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $chapa['id'] . "</td>";
            echo "<td>" . $chapa['nome'] . "</td>";
            echo "<td>" . $chapa['peso'] . "</td>";
            echo "<td>" . $chapa['nome_usuario'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Nenhuma chapa cadastrada.";
    }

    $conexao->close();
    ?>


</div>
</body>
</html>
