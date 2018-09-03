<?php
require_once 'conexion.php';

class User {
    // Se define una propiedad por cada campo de la tabla users
    // de preferencia con el mismo nombre de los campos de la tabla
    public $id = '';
    public $name = '';
    public $passwd = '';
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $remember_token = '';
    
    // Definir el metodo Login
    static function Login($username, $userpasswd) {
        try {
            // crear conexion con la base de datos
            $conn = new Conexion();
            
            // definir la consulta para login
            $sql = sprintf("select id,firstname,lastname,email from users where name='%s' and passwd=sha('%s')", $username, $userpasswd);
            
            // ejecutar la consulta
            $rst = $conn->query($sql);

            // cerrar la conexion
            $conn->close();
            
            // evaluar si regresa registros
            if ($rst->num_rows == 1) {
                // en caso de regresar registros lo mas que puede regresar es 1
                // por lo tanto se crea directamente un objeto de tipo User para
                // almacenar los datos encontrados
                $user = new User();
                
                // se extrae el registro encontrado y se deja en $row
                $row = $rst->fetch_assoc();
                
                // se asignan los valores encontrados a $user
                $user->id = $row['id'];
                $user->name = $username;
                $user->passwd = $userpasswd;
                $user->firstname = $row['firstname'];
                $user->lastname = $row['lastname'];
                $user->email = $row['email'];
                
                // retornar el objeto $user con sus valores
                return $user;
            } else {
                // si llega a este punto significa que no encontro registro alguno
                // con los datos proporcionados, en otras palabras, el usuario
                // y/o la contraseña son erróneas y debe regresar null
                return null;
            }
        } catch (Exception $ex) {
            echo "Exception: $ex";
        }
    }
}