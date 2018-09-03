-- Crear la base de datos
CREATE DATABASE `library`;

-- Crear la tabla de usuarios
CREATE TABLE `library`.`users` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
   `name` VARCHAR(20) NOT NULL UNIQUE,
   `passwd` VARCHAR(200) NOT NULL,
   `firstname` VARCHAR(50) NOT NULL,
   `lastname` VARCHAR(50) NOT NULL,
   `email` VARCHAR(200) NOT NULL UNIQUE,
   `remember_token` VARCHAR(200) DEFAULT NULL
) ENGINE=InnoDB, CHARSET=utf8, COLLATE=utf8_general_ci;

-- Insertar el primer registro de la tabla usuarios
INSERT INTO `library`.`users` (`name`,`passwd`,`firstname`,`lastname`,`email`)
VALUES ('admin',sha('123'),'Administrador','General','admin@general.com');