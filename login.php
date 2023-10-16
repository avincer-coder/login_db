<?php 

// INSERT INTO `usuarios`(`Email`, `Contraseña`, `Photo`, `Name`, `Biografia`, `Phone`) VALUES ('Mauricio@mauricio','098765','mauricio.jpg','Mauricio','Lorem12','1234567890');

session_start(); 
if (isset($_SESSION["phone"])) {
    header("location:profile.php");
}

if (isset($_POST["user"])) { // isset sirve para ejecutar el codigo dentro del if, isset detecta si la variable _POST esta vacia o no, si esta vacia da false y no ejecuta el codigo dentro del if, pero si la variable si tiene informacion entonces el isset maraca true y ejecuta el codigo sin el isset no sirve el codigo de abajo
    $userName = $_POST["user"];
    $userPassword = $_POST["contraseña"];
    require_once "db.php";
    $sql = "SELECT * FROM `usuarios` WHERE `Email` LIKE '$userName'";// $sql es una variable que guarda los userName de la tabla todo del otro lado del igual es el codigo que se usa para accesar al $userName

    $result = $con -> query($sql);// $result es una variabel creada, query es una sentencia o busqueda que lee codigo sql de la base de datos, la variable $con es la ruta que lleva a la base de datos guardada en db.php . Todo este proceso se guarda en una tabla un "objeto" en la variable $result

    // La consulta (query guardada en la variable sql) la mandamos a la conexion


    if (mysqli_num_rows($result) == 0) { //mysqli_num_rows Cuenta cuantas columnas tiene la tabla si no exsisten numeros entonces se cumple y imprime lo de abajo
        // header("location:index.php");
        echo "NO EXSISTE NINGUN CORREO";

    }else{
        $row = $result->fetch_assoc(); //->fetch_assoc() convierte la tabla que viene empaquetada en un objeto en la variable $result, a una array y la guarda en la variable $row

        // $row["Phone"]
        // echo($userPassword);
        // $hash_password = hash("sha256", $userPassword);
        
        // echo($row["Contraseña"]);
        // echo("<br>" . $hash_password);
        
        if ($userPassword == $row["Contraseña"]) { // Si la contraseña es igual a alguna que exsiste entonces redirecciona a otra pagina

            session_start();
            $_SESSION["phone"] = $row["Phone"];
            $_SESSION["correo"] = $row["Email"];
            $_SESSION["nombre"] = $row["Name"];
            $_SESSION["imagen"] = $row["Photo"];
            $_SESSION["contraseña"] = $row["Contraseña"];
            $_SESSION["biografia"] = $row["Biografia"];



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