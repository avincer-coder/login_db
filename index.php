<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3a6e8db9a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <main>
        <section class="card">
            <img class="img_dev" src="assets/devchallenges.svg" alt="devchallenges logo">
            <h1>Join thousands of learners from around the world</h1>
            <p class="text_invitacion">Master web development by making real-life projects. There are multiple paths for you to choose</p>
            <form action="crear_usuario.php" method="post">
                <div class="box_login">
                    <label class="login_email" for="text"><i class="fa-solid fa-envelope icon" ></i></label>
                    <input id="text" type="text" name="correo" placeholder="Email">
                </div>
                <div class="box_login">
                    <label class="login_lock" for="password"><i class="fa-solid fa-lock icon"></i></label>
                    <input type="password" id="password" name="contraseña" placeholder="Password">
                </div>
                <input type="submit" value="Start coding now">
            </form>
            <div class="box_bottom">
                <p class="bottom_text">or continue with these social profile</p>
                <div class="box_social">
                    <img class="social_icons icons_hover" src="assets/Google.svg" alt="google logo">
                    <img class="social_icons icons_hover" src="assets/Facebook.svg" alt="facebook logo">
                    <img class="social_icons icons_hover" src="assets/Twitter.svg" alt="twitter logo">
                    <img class="icons_hover" src="assets/Gihub.svg" alt="github logo">
                </div>
                <p class="bottom_text">Adready a member? <a class="a_regiser" href="login.php">Login</a></p>
            </div>
        </section>
    </main>
</body>
</html>
