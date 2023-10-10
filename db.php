<?php
$con = new mysqli("127.0.0.1", "root", "", "login_db");
$sql = "SELECT * FROM `usuarios`";
$result = $con -> query($sql);
$con -> close();
?>