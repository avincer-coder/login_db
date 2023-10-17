<?php
require_once "db.php";

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
echo($contraseña);
// $contraseña_hash = hash("sha256", $contraseña);
$contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);



echo($contraseña_hash);

$sql = "INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('$correo','$contraseña_hash','','','','');";

$result = $con -> query($sql);

if ($result) {  // Si la variable result trae informacion entonces ejecuta el codigo de abajo
    session_start();

            $_SESSION["correo"] = $correo;
            $_SESSION["phone"] = "";
            $_SESSION["nombre"] = "";
            $_SESSION["imagen"] = "";
            $_SESSION["contraseña"] = "";
            $_SESSION["biografia"] = "";
    header("location:profile.php");


}else{
    echo("Hubo un error no te pudimos registrar");
}
?>