<?php
// iniciar o continuar una sesión
session_start();

// Para validar si hay una sesión activa de forma sencilla
// se revisa si existe una variable de sesión llamada username
if (isset($_SESSION['username'])) {
    // en caso de haber una sesión activa muestra el enlace a logout.php
    echo '<a href="logout.php">Cerrar sesión de '.$_SESSION['username'].'</a>';
} else {
    // en caso de no haber una sesión activa muestra el enlace a login.php
    echo '<a href="login.php">Iniciar sesión</a>';
}