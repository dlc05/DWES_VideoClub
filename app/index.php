<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    <title>Login - VideoClub</title>
</head>
<body>
<form action="login.php" method="post">
    <div class="container">
        <h1>Log in</h1>
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
            <button type="submit" name="entrar">Entrar</button>
            <button type="button" onclick="location.href='registration.php'">Sign up</button>
        </div>

    </div>
</form>
</body>
</html>