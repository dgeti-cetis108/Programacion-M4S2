<?php
// La clase mysqli: Representa una conexión entre PHP y una base de datos MySQL
class Conexion extends \mysqli {
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = 'toor';
    private $dbname = 'library';
    private $port = 3306;
    
    public function __construct() {
        // El constructor de la clase padre realiza la conexión a MySQL
        parent::__construct($this->host, $this->username, $this->password,
							$this->dbname, $this->port);
    }
}