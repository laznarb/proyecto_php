<?php

//Crear una conexión
$conn = new mysqli("localhost", "root", "");

//Crear base de datos
$sql = "CREATE DATABASE proyecto";
if ($conn->query($sql) === TRUE){
    echo "La base de datos se ha creado con éxito";
}

$conn->close();
?>