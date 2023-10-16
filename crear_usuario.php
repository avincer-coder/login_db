<?php
require_once "db.php";

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
echo($contraseña);
$contraseña_hash = hash("sha256", $contraseña);
echo($contraseña_hash);

$sql = "INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('$correo','$securety','mauricio.jpg','Mauricio','Lorem12','1234567890');";

$result = $con -> query($sql);

if ($result) {  // Si la variable result trae informacion entonces ejecuta el codigo de abajo
    header("location:login.php");
}else{
    echo("Hubo un error no te pudimos registrar");
}
?>