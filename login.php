<?php
require_once 'classes/user.php';

// iniciar o continuar una sesión
session_start();

// validar si hay una sesión activa y
// en su caso redireccionar a index.php
if (isset($_SESSION['username'])) {
    header('Location:index.php');
} else {
    // sino entonces preguntar si se han recibido
    // valores desde un formulario por el metodo post,
    // la variable de formulario frmID existe si el
    // formulario frmLogin ha sido enviado por medio
    // del botón tipo submit
    if (isset($_POST['frmID'])) {
        // validar que el username y password hayan sido enviados con valores
        if ($_POST['txtUsername'] != '' && $_POST['txtPassword'] != '') {
            // obtener los datos del formulario
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];

            // validar los datos de inicio de sesión
            $user = User::Login($username, $password);

            // si $user es diferente de null quiere decir que el inicio de
            // sesión es válido, ya revisado desde la base de datos
            if ($user != null) {
                // se registra una variable de sesión con el nombre de usuario
                $_SESSION['username'] = $username;

                // redireccionar a index.php
                header('Location:index.php');
            } else {
                // si $user es null entonces el usuario y contraseña buscados
                // no existen en la base de datos
                $error = 'Nombre de usuario y/o contraseña incorrectos.';
            }
        } else {
            // si falta el username o el password muestra el error
            $error = 'El nombre de usuario y contraseña son obligatorios.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca: Inicio de sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form action="login.php" id="frmLogin" method="post">
        <input type="hidden" name="frmID" value="frmLogin">
        <h3 class="form-title">Inicio de sesión</h3>
        <div class="form-control">
            <label for="txtUsername">Nombre de usuario</label>
            <input type="text" name="txtUsername" id="txtUsername" value="<?= isset($username) ? $username : '';  ?>">
        </div>
        <div class="form-control">
            <label for="txtPassword">Contraseña</label>
            <input type="password" name="txtPassword" id="txtPassword">
        </div>
        <!-- Si hay algun error por no haber capturado usuario o contraseña aqui se mostrará -->
        <?php if (isset($error)) { ?>
            <div class="form-error">
                <p><?= $error; ?></p>
            </div>
        <?php } ?>
        <div class="form-control">
            <input type="submit" value="Iniciar sesión">
        </div>
    </form>
</body>
</html>