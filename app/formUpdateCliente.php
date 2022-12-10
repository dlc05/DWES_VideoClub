<?php
    include "../autoload.php";

    session_start();

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    }

    if(isset($id)){
        if(isset($_SESSION['videoclub'])){
            $videoclub = unserialize($_SESSION['videoclub']);
            foreach($videoclub->getSocios() as $socio){
                if($socio->getNumero() == $id){
                    $usuario = $socio->nombre;
                    $password = $socio->password;
                }
            }
        }
    }else{
        if(isset($_SESSION['cliente'])){
            $cliente = unserialize($_SESSION['cliente']);
            $usuario = $cliente->nombre;
            $password = $cliente->password;
        }else{
            header('Location:mainAdmin.php');
            return;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    <title>Modificar cliente - Videoclub</title>
</head>
<body>
<form action="updateCliente.php" method="post">
    <div class="container">
        <h1>Modificar cliente</h1>
        <input type="number" name="id" <?php echo isset($id) ? 'value="'. $id.'"' : ""; ?> readonly>
        <input type="text" name="usuario" placeholder="Introduce el nombre" value="<?php echo $usuario?>">
        <input type="password" name="password" placeholder="Introduce la contraseña" value="<?php echo $password?>">

        <?php
        if(isset($mensajeError)) {
            echo '<div id="container-box" class="error">';
            echo '<label id="container-msg">' . $mensajeError . '</label>';
            echo '</div>';
        }
        ?>
        <div style="display: flex">
            <button type="submit" name="modificarCliente">Modificar</button>
            <button type="button" onclick="location.href='mainAdmin.php'">Volver</button>
        </div>
    </div>
</form>
</body>
</html>
