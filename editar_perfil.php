<?php 
session_start(); 
$phone = $_SESSION["phone"];
$correo = $_SESSION["correo"];
$nombre = $_SESSION["nombre"];
$imagen = $_SESSION["imagen"];
$biografia = $_SESSION["biografia"];


if (isset($_SESSION["correo"])) {
   
}else{
    header("location:index.php");
}

if (!empty($_POST["correo"]) && !empty($_POST["contraseña"])) {

    $correo_session = $_SESSION["correo"];

    require_once "db.php";
    // Creacion de variables locales
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $nombre_imagen = $_FILES["imagen"]["name"];
    $tem_ruta_img = $_FILES["imagen"]["tmp_name"];
    $biografia = $_POST["biografia"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $nombre_img_nuevo = $correo . ".jpg";
    $carpeta_destino = "img/";
    $ruta_guardar = $carpeta_destino . $nombre_img_nuevo; 


    // Funcion para subir y guardar imagen 
    if ( move_uploaded_file($tem_ruta_img, $ruta_guardar)) {
        echo("La imagen se a cargado correctamente.");
    }else{
        echo("ERROR AL SUBIR IMAGEN");
    }

    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT); //hashear contraseña


    


    $actualizar = "UPDATE `usuarios` SET `Email`='$correo',`Contraseña`='$contraseña_hash',`Photo`='$nombre_img_nuevo',`Name`='$nombre',`Biografia`='$biografia',`Phone`='$telefono' WHERE `Email`='$correo_session';"; // sentencia sql o query 

    try {
        $result = $con -> query($actualizar);
        $_SESSION["phone"] = $telefono;
        $_SESSION["correo"] = $correo;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["imagen"] = $nombre_img_nuevo;
        $_SESSION["contraseña"] = $contraseña;
        $_SESSION["biografia"] = $biografia;
        header("Location: profile.php");
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // 1062 es el código de error para duplicados
            echo "<script>alert('¡Ese correo ya esta en uso!');</script>"; 
        } else {
            // Otro error, manejarlo apropiadamente
            echo "Error: " . $e->getMessage();
        }
    }
}else{
    echo "<script>alert('Keep this in mind the email and password spaces can not be send empty!');</script>"; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar_perfil.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">  
</head>
<body>
    <div class="top">
        <img src="assets/devchallenges.svg" alt="dev logo">
        <div class="box_perfil">
            <div class="box_perfil_top">
                <img class="small_img_profil" src="<?php
                 echo("img/" . $imagen) ?>" alt="imagen de perfil">
                <p class="text_perfil"><?php echo($nombre)?></p>
                <i class="fa-solid fa-sort-down"></i>
            </div>
            <div class="box_perfil_bottom">
                <div class="open_modal">
                    <i class="fa-solid fa-circle-user icon_margin"></i>
                    <p>My Profile</p>
                </div>
                <div class="open_modal">
                    <i class="fa-solid fa-users icon_margin"></i>
                    <p>Gruop Chat</p>
                </div>
                <div class="open_modal logout_box">
                    <i class="fa-solid fa-arrow-right-to-bracket icon_margin" style="color: #f50000;"></i>
                    <a class="log_out" href="cerrar_sesion.php">Log out</a>
                </div>
                
            </div>
        </div>
    </div>




    
    <section class="full_container">
        <a class="back" href="profile.php"><    Back</a>
        <article class="card">
            <h1>Change Info</h1>
            <p class="title_description">Changes will be reflected to every services</p>
            <div class="form_container">
                <form action="" method="post" enctype="multipart/form-data">

                    <label class="img_label" for="imagen"> 
                        <img class="small_img_profil2" src="<?php echo("img/" . $imagen) ?>" alt="imagen de perfil">
                        <i class="fa-solid fa-camera" style="color: #ffff;"></i>
                        <p>CHOOSE PHOTO</p>
                    </label>

                    <input class="input_file" id="imagen" type="file" name="imagen">
                    
                    <label for="nombre">Name</label>
                    <input placeholder="Enter your name..." id="nombre" type="text" name="nombre">
                    <label for="biografia">Bio</label>
                    <input class="bio" placeholder="Enter your bio..." id="biografia" type="text" name="biografia">
                    <label for="telefono">Phone</label>
                    <input placeholder="Enter your phone..." id="telefono" type="number" name="telefono">
                    <label for="correo">Email</label>
                    <input placeholder="Enter your email..." id="correo" type="text" name="correo">
                    <label for="contraseña">Password</label>
                    <input placeholder="Enter your new password..." id="contraseña" type="password" name="contraseña">
                    <input type="submit" value="Save">
                </form>
            </div>
        </article>
    </section>
    <script src="profile.js" ></script>
</body>
</html>