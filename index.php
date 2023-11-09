<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tienda de arte🎨</h1>
    <?php
        //Realizo la conexión con la base de datos
        include('conexion.php');
        //Hago la consulta de lo que quiero mostrar
        $sql = "select nombre,descripcion,precio from productos where estado='disponible'";
        //Ejecutamos y recogemos el resultado
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            echo "<article>";
            echo "<p><h3>".$row['nombre']."</h3></p>"; 
            echo "<p>".$row['descripcion']."</p>"; 
            echo "<p> Precio: ".$row['precio']."€</p>";
            echo "<p><a href='carrito.php?idcarrito=".$row['id']."'>Añadir al carrito</a></p>"; 
            echo "</article>";
        }

    echo "</table>";
    ?>
</body>
</html>