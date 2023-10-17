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
        // $hash_password = hash("sha256", $userPassword);
        if (password_verify($userPassword, $row["Contraseña"])) {
            session_start();
            $_SESSION["phone"] = $row["Phone"];
            $_SESSION["correo"] = $row["Email"];
            $_SESSION["nombre"] = $row["Name"];
            $_SESSION["imagen"] = $row["Photo"];
            $_SESSION["contraseña"] = $row["Contraseña"];
            $_SESSION["biografia"] = $row["Biografia"];

            header("location:profile.php");
        }else{
            echo "TU CONTRASEÑA ESTA INCORRECTA";
        }




        // if ($hash_password == $row["Contraseña"]) { // Si la contraseña es igual a alguna que exsiste entonces redirecciona a otra pagina

        //     session_start();
        //     $_SESSION["phone"] = $row["Phone"];
        //     $_SESSION["correo"] = $row["Email"];
        //     $_SESSION["nombre"] = $row["Name"];
        //     $_SESSION["imagen"] = $row["Photo"];
        //     $_SESSION["contraseña"] = $row["Contraseña"];
        //     $_SESSION["biografia"] = $row["Biografia"];



        //     header("location:profile.php");

        // }else {
        //     echo "TU CONTRASEÑA ESTA INCORRECTA";
        // }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">   
</head>
<body>
    <section class="card">
        <img class="img_dev" src="assets/devchallenges.svg" alt="devchallenges logo">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="box_login">
                <labe class="login_email" for="text"><i class="fa-solid fa-envelope icon" ></i></label>
                <input id="text" type="text" name="user" placeholder="Email">
            </div>
            <div class="box_login">
                <label class="login_lock" for="password"><i class="fa-solid fa-lock icon"></i></label>
                <input type="password" id="password" name="contraseña" placeholder="Password">
            </div>
            <input type="submit" value="Login">
        </form>
        <div class="box_bottom">
            <p class="bottom_text">or continue with these social profile</p>
            <div class="box_social">
                <img class="social_icons icons_hover" src="assets/Google.svg" alt="google logo">
                <img class="social_icons icons_hover" src="assets/Facebook.svg" alt="facebook logo">
                <img class="social_icons icons_hover" src="assets/Twitter.svg" alt="twitter logo">
                <img class="icons_hover" src="assets/Gihub.svg" alt="github logo">
            </div>
            <p class="bottom_text">Don’t have an account yet? <a class="a_regiser" href="index.php">Register</a></p>
        </div>
        <p>PRUEBA</p>
    </section>
</body>
</html>