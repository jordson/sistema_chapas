<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Cadastrar Refugo</h1>
    <form action="salvar_produto.php" method="post">
        <div class="mb-3">
            <label for="nomeProduto" class="form-label">Tipo de Chapa:</label>
            <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" required>
        </div>
        <div class="mb-3">
            <label for="pesoProduto" class="form-label">Peso:</label>
            <input type="number" step="0.01" class="form-control" name="pesoProduto" id="pesoProduto" required>
        </div>
        <div class="mb-3">
            <label for="nomeUsuario" class="form-label">Responsável pelo Peso :</label>
            <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
</body>
</html>
