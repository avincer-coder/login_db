<?php 
// if (logeado) {
//     echo "Esta informacion solo deberia verse por un  usario loguedo";
// }else{
//     header("location:login.php");
// }
// $userPassword = $_POST["contraseña"];

session_start();
$log = $_SESSION["phone"];
$correo = $_SESSION["correo"];
$nombre = $_SESSION["nombre"];
$imagen = $_SESSION["imagen"];
echo "TEXTO DE PRUEBA" . $log;
echo "TEXTO DE PRUEBA NUMERO DOS" . $correo;


if (isset($_SESSION["phone"])) {
    echo $log;
}else{
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="editar_perfil.php">Editar</a>
    <P>Telephono <?php echo($log)?></P>
    <P>Correo <?php echo($correo)?></P>
    <P>Nombre <?php echo($nombre)?></P>
    <P>Imagen <?php echo($imagen)?></P>
    <img src="<?php echo($imagen) ?>" alt="imagen de perfil">
    <a href="cerrar_sesion.php">Cerrar Sesion</a>
</body>
</html>