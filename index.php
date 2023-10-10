<?php

echo "Hola a todos";


$con = new mysqli("127.0.0.1", "root", "", "login_db");
$sql = "SELECT * FROM `usuarios`";

$result = $con -> query($sql);

foreach ($result as $cada_result){
    print_r($cada_result);
}

$con -> close();

?>