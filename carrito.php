<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    include('header.php');
    include('menu.php');
    echo "<h1 class='carrito'>Mi carrito de la compra</h1>";
        if(isset($_REQUEST['idcarrito'])){
            $idcarrito=$_REQUEST['idcarrito'];
            
            include('conexion.php');
            session_start();

            // Declaramos un nuevo array vacio
            $idguardados = array();

            // Si ya existe el array con numero en sesion lo recupero
            // para no sobreescribirlo
            if(isset( $_SESSION['guardados'])){
                $idguardados = $_SESSION['guardados'];
            }

            // Añado el nuevo numero al final de la lista
            $idguardados[] = $idcarrito;

            $_SESSION['guardados'] = $idguardados;

            for($i=0; $i<count($idguardados); $i++){
            $sql="select id,nombre,descripcion,precio from productos where id=$idguardados[$i]";
            $result=$conn->query($sql);
            echo "<table class='tablac'>";
                echo "<tr>";
                    echo "<th>Nombre</td>"; 
                    echo "<th>Descripción</td>"; 
                    echo "<th>Precio</td>";  
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['nombre']."</td>"; 
                        echo "<td>".$row['descripcion']."</td>"; 
                        echo "<td>".$row['precio']."</td>"; 
                        echo "</tr>";
                    }
            echo "</table>";
        }
        echo "<p><a href='vaciar.php'>Borrar todo</a></p>";
        echo "<p><a href='pedido.php'>Hacer pedido</a></p>";
        $conn->close();
        }else{
            session_start();
            include('conexion.php');

            if(isset($_SESSION['guardados'])){
                $idguardados = $_SESSION['guardados'];

                for($i=0; $i<count($idguardados); $i++){
                $sql="select id,nombre,descripcion,precio from productos where id=$idguardados[$i]";
                $result=$conn->query($sql);
                echo "<table border='1'>";
                    echo "<tr>";
                        echo "<th>Nombre</td>"; 
                        echo "<th>Descripción</td>"; 
                        echo "<th>Precio</td>";  
                    echo "</tr>";
                    while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['nombre']."</td>"; 
                            echo "<td>".$row['descripcion']."</td>"; 
                            echo "<td>".$row['precio']."</td>"; 
                            echo "</tr>";
                        }
                echo "</table>";
                    }
            }else{
                echo "No se encuentra el producto que solicitas";
            }
        }

       include('footer.php'); 
    ?>
</body>
</html>