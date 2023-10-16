<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="crear_usuario.php" method="post">
        <label for="correo">Correo</label>
        <input id="correo" type="text" name="correo">
        <label for="contraseña">Contraseña</label>
        <input id="contraseña" type="password" name="contraseña">
        <input type="submit">
    </form>
    <p>
        <a href="login.php">Login</a>
    </p>
</body>
</html>