<?php
require_once "db.php";

$correo = "jaime@jaime";
$contraseña = "123456";

$securety = hash("sha256", $contraseña);
echo $securety . "</br>";
$sql = "INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('$correo','$securety','mauricio.jpg','Mauricio','Lorem12','1234567890');";

// INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('Mauricio@mauricio','098765','mauricio.jpg','Mauricio','Lorem12','1234567890');

echo $sql;
$result = $con -> query($sql);
echo $result;
if ($result) {  // Si la variable result trae informacion entonces ejecuta el codigo de abajo
    echo"Registro creado correctamente.";
}
?>