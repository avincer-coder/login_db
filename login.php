<?php 
$userName = $_POST["user"];
$userPassword = $_POST["contraseña"];
require_once "db.php";
$sql = "SELECT * FROM `usuarios` WHERE `Email` LIKE '$userName'";
$result = $con -> query($sql);// Trae la tabla de la base de datos
// La consulta (query guardada en la variable sql) la mandamos a la conexion

if (mysqli_num_rows($result) == 0) { //mysqli_num_rows Cuenta cuantas columnas tiene la tabla si no exsisten numeros entonces se cumple y imprime lo de abajo
    echo "NO EXSISTE NINGUN CORREO";
}else{
    $row = $result->fetch_assoc(); //->fetch_assoc() convierte la tabla que viene empaquetada en un objeto en la variable $result, en una array 
    if ($userPassword == $row["Contraseña"]) { // Si la contraseña es igual a alguna que exsiste entonces redirecciona a otra pagina
        header("location:profile.php");
    }
}



// foreach ($result as $cada_result){
//     print_r($cada_result["Email"] . "<br>");
//     if ($cada_result["Email"] == $userName && $cada_result["Contraseña"] == $userPassword) {
//         echo "Bienvenido has entrado al login";
//     }
// }

?>



