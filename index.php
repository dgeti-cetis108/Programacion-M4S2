<?php
// Incluir el archivo conexion.php
require 'classes/conexion.php';

try {
    // Crear una Conexion
    $conn = new Conexion();
    
    // Definir la consulta (query) SQL
    $sql = 'select * from users where id = 1';
    
    // Ejecutar la consulta
    $rst = $conn->query($sql);
    
    // Evaluar el resultado, num_rows = número de registros encontrados
    if ($rst->num_rows == 1) {
        echo '<h3 style="color:blue">Conexión satisfactoria: Usuario encontrado</h3>';
    } else {
        echo '<h3 style="color:red">Conexión satisfactoria: Usuario no encontrado</h3>';
    }
} catch(Exception $ex) {
    // Si algo falla y se lanza una excepción aqui es capturada y mostrada
    echo "Excepción: $ex";
}