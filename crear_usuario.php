<?php
require_once "db.php";

if (!empty($_POST["correo"]) && !empty($_POST["contraseña"])) {
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('$correo','$contraseña_hash','','','','');";
    

    try {
        $result = $con -> query($sql);
        if ($result) {  // Si la variable result trae informacion entonces ejecuta el codigo de abajo
            session_start();
                    $_SESSION["correo"] = $correo;
                    $_SESSION["phone"] = "";
                    $_SESSION["nombre"] = "";
                    $_SESSION["imagen"] = "";
                    $_SESSION["contraseña"] = "";
                    $_SESSION["biografia"] = "";
                    // $_SESSION["contraseñaNoHash"] = $contraseña;
            header("location:profile.php");
        }else{
            echo("Hubo un error no te pudimos registrar");
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // 1062 es el código de error para duplicados
            echo "El correo ya existe en la base de datos.";
        } else {
            // Otro error, manejarlo apropiadamente
            echo "Error: " . $e->getMessage();
        }
    }



    
}else{
    echo("¡Te falta llenar informacion!");
}




?>