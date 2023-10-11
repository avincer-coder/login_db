<?php 
// if (logeado) {
//     echo "Esta informacion solo deberia verse por un  usario loguedo";
// }else{
//     header("location:login.php");
// }
// $userPassword = $_POST["contraseña"];

session_start();
$log = $_SESSION["logueado"];
echo $log;


if (isset($_SESSION["logueado"])) {
    echo $log;
}else{
    header("location:index.php");
}

?>