<?php 

if (isset($_POST["correo"])) {

    session_start();
    $correo_session = $_SESSION["correo"];

    require_once "db.php";

    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $nombre_imagen = $_FILES["imagen"]["name"];
    $tem_ruta_img = $_FILES["imagen"]["tmp_name"];


    $biografia = $_POST["biografia"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $nombre_img_nuevo = $correo . ".jpg";

    $carpeta_destino = "img/";
    $ruta_guardar = $carpeta_destino . $nombre_img_nuevo; 
    move_uploaded_file($tem_ruta_img, $ruta_guardar);



    $actualizar = "UPDATE `usuarios` SET `Email`='$correo',`Contraseña`='$contraseña',`Photo`='$nombre_img_nuevo',`Name`='$nombre',`Biografia`='$biografia',`Phone`='$telefono' WHERE `Email`='$correo_session';";

    $result = $con -> query($actualizar);

    $_SESSION["phone"] = $telefono;
    $_SESSION["correo"] = $correo;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["imagen"] = $nombre_img_nuevo;
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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="correo">Correo</label>
        <input id="correo" type="text" name="correo">
        <label for="contraseña">Contraseña</label>
        <input id="contraseña" type="password" name="contraseña">
        <label for="imagen">Imagen</label>
        <input id="imagen" type="file" name="imagen">
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