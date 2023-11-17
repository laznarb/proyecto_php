<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="estilos_carrito.css">
</head>
<main>
<body>
    <?php
    include('header.php');
    include('menu.php');

    echo "<article>";
    echo "<h1>Mi carrito de la compra</h1></br>";
    session_start();
    
    // Si me envias un id es para que lo añada al carrito
    if(isset($_REQUEST['idcarrito'])){
        $idcarrito=$_REQUEST['idcarrito'];
        
        // Declaramos un nuevo array vacio
        $idguardados = array();

        // Si ya existe el array con numero en sesion lo recupero
        // para no sobreescribirlo
        if(isset( $_SESSION['guardados'])){
            $idguardados = $_SESSION['guardados'];

            //Si ya hay productos guardados no añadir si ya existe el producto
            if(!in_array($idcarrito, $idguardados)){
                $idguardados[] = $idcarrito;
            }
        } else {
            // Añado el nuevo numero al final de la lista
            $idguardados[] = $idcarrito;
        }

    
        $_SESSION['guardados'] = $idguardados;
    }

    // En cualquiera de los casos mostraré el carrito
    if(isset($_SESSION['guardados'])){
        $idguardados = $_SESSION['guardados'];

        include('conexion.php');

        echo "<table>";
        echo "<tr>";
            echo "<th>Imágen</th>";
            echo "<th>Nombre</th>"; 
            echo "<th>Descripción</th>"; 
            echo "<th>Precio</th>";  
        echo "</tr>";

        for($i=0; $i<count($idguardados); $i++){
            $sql="select id,imagen,nombre,descripcion,precio from productos where id=$idguardados[$i]";
            $result=$conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src=".$row['imagen']." alt='imagen'></td>"; 
                echo "<td>".$row['nombre']."</td>"; 
                echo "<td>".$row['descripcion']."</td>"; 
                echo "<td>".$row['precio']."</td>"; 
                echo "</tr>";
            }

        }
        echo "</table>";

        echo "<p><a class='boton' href='vaciar.php'>Borrar todo</a></p>";
        echo "<p><a class='boton' href='pedido.php'>Hacer pedido</a></p>";
    }else{
        echo "No se encuentra el producto que solicitas";
    }
    echo "</article>";
       include('footer.php'); 
    ?>
</body>
<main>
</html>