<?php 

if (isset($_POST["user"])) {
    $userName = $_POST["user"];
    $userPassword = $_POST["contraseña"];
    require_once "db.php";
    $sql = "SELECT * FROM `usuarios` WHERE `Email` LIKE '$userName'";

    $result = $con -> query($sql);// Trae la tabla de la base de datos
    // La consulta (query guardada en la variable sql) la mandamos a la conexion


    if (mysqli_num_rows($result) == 0) { //mysqli_num_rows Cuenta cuantas columnas tiene la tabla si no exsisten numeros entonces se cumple y imprime lo de abajo
        // header("location:index.php");
        echo "NO EXSISTE NINGUN CORREO";

    }else{
        $row = $result->fetch_assoc(); //->fetch_assoc() convierte la tabla que viene empaquetada en un objeto en la variable $result, a una array 
        if ($userPassword == $row["Contraseña"]) { // Si la contraseña es igual a alguna que exsiste entonces redirecciona a otra pagina
            header("location:profile.php");

        }else {
            echo "TU CONTRASEÑA ESTA INCORRECTA";
        }
    }
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
    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input id="usuario" type="text" name="user">
        <input type="password" name="contraseña">
        <input type="submit">
    </form>
</body>
</html>