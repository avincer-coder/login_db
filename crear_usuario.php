<?php
require_once "db.php";

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
echo($contraseña);
// $contraseña_hash = hash("sha256", $contraseña);
$contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);



echo($contraseña_hash);

$sql = "INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('$correo','$contraseña_hash','mauricio.jpg','Mauricio','Lorem12','1234567890');";

$result = $con -> query($sql);

if ($result) {  // Si la variable result trae informacion entonces ejecuta el codigo de abajo
    header("location:login.php");
}else{
    echo("Hubo un error no te pudimos registrar");
}
?>