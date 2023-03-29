<?php
require_once 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM chapas WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $chapa = $result->fetch_assoc();
}

if(isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $peso = $_POST['peso'];

    $sql = "UPDATE chapas SET nome = ?, peso = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sdi", $nome, $peso, $id);
    $stmt->execute();

    header("Location: painel_adm.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Chapa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1 class="mt-4 mb-4">Editar Chapa</h1>

    <form method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $chapa['nome']; ?>">
        </div>

        <div class="form-group">
            <label for="peso">Peso:</label>
            <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $chapa['peso']; ?>">
        </div>

        <button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
        <a href="painel_adm.php" class="btn btn-secondary">Voltar</a>

    </form>
</div>

</body>
</html>
