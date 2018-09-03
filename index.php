<?php
// Incluir los archivos conexion.php y user.php
require 'classes/conexion.php';
require 'classes/user.php';

// llamar al método estático Login de la clase User
// pasando valores de usuario y contraseña
$user = User::Login('admin','123');

// evaluar el resultado
if (isset($user)) {
    echo "Acceso correcto: Bienvenido $user->firstname $user->lastname.";
} else {
    echo 'Usuario y/o contraseña incorrecto.';
}