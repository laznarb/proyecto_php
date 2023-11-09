<?php
    //Creo la conexión
    include('conexion.php');
    //Creo las tablas
    $sql="CREATE TABLE IF NOT EXISTS Productos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        descripcion VARCHAR(200) NOT NULL,
        precio INT(6) NOT NULL,
        estado VARCHAR(10) NOT NULL,
    )";
    "CREATE TABLE IF NOT EXISTS Clientes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(20) NOT NULL,
        apellido VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
    )";
    "CREATE TABLE IF NOT EXISTS Pedidos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_Productos INT(6) NOT NULL,
        precio_Productos INT(6) NOT NULL,
        id_Clientes INT(6) NOT NULL,
        nombre_Clientes VARCHAR(20) NOT NULL,
        email_Clientes VARCHAR(50) NOT NULL,
    )";
    $conn->close();
?>