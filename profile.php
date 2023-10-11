<?php 
// if (logeado) {
//     echo "Esta informacion solo deberia verse por un  usario loguedo";
// }else{
//     header("location:login.php");
// }
// $userPassword = $_POST["contraseña"];

session_start();
$log = $_SESSION["logueado"];
echo $log;


if (isset($_SESSION["logueado"])) {
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
    <a href="cerrar_sesion.php">Cerrar Sesion</a>
</body>
</html>