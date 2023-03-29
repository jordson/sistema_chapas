<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form action="autenticar.php" method="post">
        <div class="user-box">
            <input type="text" name="nomeUsuario" required="">
            <label>Usuario</label>
        </div>
        <div class="user-box">
            <input type="password" name="senhaUsuario" required="">
            <label>Senha</label>
        </div>
        <button type="submit">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Entrar
        </button>
    </form>
</div>
</body>
</html>
