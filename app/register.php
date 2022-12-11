<?php
    if(isset($_COOKIE['usuario'])){
        header('Location:mainAdmin.php');
        return;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    <title>Register - Videoclub</title>
</head>
<body>
<form action="signup.php" method="post">
    <div class="container">
        <h1>Sign up</h1>
        <input type="text" name="usuario" placeholder="Introduce tu usuario">
        <input type="password" name="password" placeholder="Introduce tu contraseña">

        <?php
        if(isset($mensajeError)) {
            echo '<div id="container-box" class="error">';
            echo '<label id="container-msg">' . $mensajeError . '</label>';
            echo '</div>';
        }
        ?>
        <div style="display: flex">
            <button type="submit" name="registrar">Registrarse</button>
            <button type="button" onclick="location.href='index.php'">Log in</button>
        </div>
    </div>
</form>
</body>
</html>