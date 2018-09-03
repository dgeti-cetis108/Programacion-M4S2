<?php
// iniciar o continuar una sesión
session_start();

// cerrar sesión
session_destroy();

// redirigir a index.php
header('Location:index.php');