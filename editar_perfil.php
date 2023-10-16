<?php 

if (isset($_POST["correo"])) {

    session_start();
    $correo_session = $_SESSION["correo"];

    require_once "db.php";

    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $imagen = $_POST["imagen"];
    $biografia = $_POST["biografia"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    $actualizar = "UPDATE `usuarios` SET `Email`='$correo',`Contraseña`='$contraseña',`Photo`='$imagen',`Name`='$nombre',`Biografia`='$biografia',`Phone`='$telefono' WHERE `Email`='$correo_session';";

    $result = $con -> query($actualizar);

    $_SESSION["phone"] = $telefono;
    $_SESSION["correo"] = $correo;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["imagen"] = $imagen;
    $_SESSION["contraseña"] = $contraseña;
    $_SESSION["biografia"] = $biografia;






    header("Location: profile.php");




}








// session_start(); 
// if (isset($_SESSION["phone"])) {
//     header("location:profile.php");
// };





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="correo">Correo</label>
        <input id="correo" type="text" name="correo">
        <label for="contraseña">Contraseña</label>
        <input id="contraseña" type="password" name="contraseña">
        <label for="imagen">Imagen</label>
        <input id="imagen" type="password" name="imagen">
        <label for="biografia">biografia</label>
        <input id="biografia" type="password" name="biografia">
        <label for="telefono">telefono</label>
        <input id="telefono" type="password" name="telefono">
        <label for="nombre">Nombre</label>
        <input id="nombre" type="password" name="nombre">
        <input type="submit">
    </form>
</body>
</html>