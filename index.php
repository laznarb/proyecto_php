<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de arte 🎨</title>
    <link rel="icon" type="image/png-image" href="imagenes/mancha_pintura.png">
    <link rel="stylesheet" href="estilos.css">
</head>
<main>
    <body>
        <?php
        include('header.php');
        include('menu.php');
            //Realizo la conexión con la base de datos
            include('conexion.php');
            //Hago la consulta de lo que quiero mostrar
            $sql = "select id,nombre,descripcion,precio from productos where estado='disponible'";
            //Ejecutamos y recogemos el resultado
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                echo "<article>";
                echo "<p><h3>".$row['nombre']."</h3></p>"; 
                echo "<p>".$row['descripcion']."</p>"; 
                echo "<p><h4> Precio: ".$row['precio']."€</h4></p>";
                echo "<p><a class='boton' href='carrito.php?idcarrito=".$row['id']."'>Añadir al carrito</a></p>"; 
                echo "</article>";
            }
        include('footer.php');
        ?>
    </body>
</main>
</html>