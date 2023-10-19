<?php 
session_start();
if (!isset($_SESSION["correo"])) {
    header("location:index.php");
}


$log = $_SESSION["phone"];
$correo = $_SESSION["correo"];
$nombre = $_SESSION["nombre"];
$imagen = $_SESSION["imagen"];
$biografia = $_SESSION["biografia"];
// $contraseña = $_SESSION["contraseñaNoHash"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
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
                <img class="small_img_profil" src="<?php echo("img/" . $imagen) ?>" alt="imagen de perfil">
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
    <h1>Personal info</h1>
    <p class="title_description">Basic info, like your name and photo</p>
    <section>

    
        <div class="box_top title_profile">
            <div class="">
                <h2>Profile</h2>
                <p class="subtitle_description">Some info may be visible to other people</p>
            </div>
            <a class="edit_btn" href="editar_perfil.php">Edit</a>
        </div>
        <div class="boxes_info">
            <P class="edite_title">PHOTO</P>
            <img class="img_profil" src="<?php echo("img/" . $imagen) ?>" alt="imagen de perfil">
        </div>
        <div class="boxes_info">
            <P class="edite_title">NAME</P>
            <p><?php echo($nombre)?></p>
        </div>
        <div class="boxes_info">
            <p class="edite_title">BIO</p>
            <p><?php echo($biografia)?></p>
        </div>
        <div class="boxes_info">
            <p class="edite_title">PHONE</p>
            <p><?php echo($log)?></p>
        </div>
        <div class="boxes_info">
            <p class="edite_title">EMAIL</p>
            <p><?php echo($correo)?></p>
        </div>
        <div class="box_bot">
            <p class="edite_title">PASSWORD</p>
            <!-- <p><?php echo($contraseña)?></p> -->
            <p>************</p>
        </div>
       
        
        
        
    </section>
    <script src="profile.js" ></script>
</body>
</html>