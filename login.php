<?php 
$userName = $_POST["user"];
$userPassword = $_POST["contraseña"];
require_once "db.php";

foreach ($result as $cada_result){
    // print_r($cada_result["Email"] . "<br>");
    if ($cada_result["Email"] == $userName && $cada_result["Contraseña"] == $userPassword) {
        echo "Bienvenido has entrado al login";
    }
}
?>