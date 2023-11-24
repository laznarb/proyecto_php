<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <style>
        h3{
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        table{
            margin: 5px;
        }
        table img{
            width: 10%;
        }
        table th{
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            color: brown;
            background-color: #ffd566;
            text-decoration: none;
        }
        table td{
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            color: brown;
            background-color: lightgoldenrodyellow;
            text-decoration: none;
        }
        table a{
            color: black;
            text-decoration: none;
        }
        table a:hover{
            color: grey;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['usuario']) && isset($_SESSION['contraseña'])){
            echo "<h3>PEDIDOS:</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID pedido</th>";
                    echo "<th>ID cliente</th>"; 
                    echo "<th>Usuario</th>"; 
                    echo "<th>ID producto</th>";
                    echo "<th>Precio/Unidad</th>";  
                echo "</tr>";

                include('conexion.php');

                $sql="select id_pedido,id_Clientes,usuario,id_producto,precio_unidad FROM detalle_pedido JOIN pedidos WHERE id_pedido=id";
                $result=$conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id_pedido']."</td>"; 
                    echo "<td>".$row['id_Clientes']."</td>"; 
                    echo "<td>".$row['usuario']."</td>"; 
                    echo "<td>".$row['id_producto']."</td>";
                    echo "<td>".$row['precio_unidad']."</td>";
                    echo "</tr>";
                }
            echo "</table>";
            
            echo "<h3>PRODUCTOS:</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nombre</th>"; 
                    echo "<th>Descripción</th>"; 
                    echo "<th>Precio</th>";
                    echo "<th>Estado</th>";
                    echo "<th>Imágen</th>";   
                echo "</tr>";

                $sql="select * FROM productos WHERE estado='disponible'";
                $result=$conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>"; 
                    echo "<td>".$row['nombre']."</td>"; 
                    echo "<td>".$row['descripcion']."</td>"; 
                    echo "<td>".$row['precio']."</td>";
                    echo "<td>".$row['estado']."</td>";
                    echo "<td><img src=".$row['imagen']." alt='imagen'></td>";
                    echo "<td><a href='borrar.php?idborrar=".$row['id']."'>X</a></td>"; 
                    echo "<td><a href='update.php?idmodificar=".$row['id']."'>Modificar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<p>*NOTA DEL AUTOR: SI PULSAS SOBRE MODIFICAR EL ESTADO DEL PRODUCTO PASARÁ A SER 'NO DISPONIBLE'*</p>";
                if(isset($_SESSION['mensaje'])){
                    echo "<p>".$_SESSION['mensaje']."</p>";
                }
            
            echo "<h3>INTRODUCIR PRODUCTOS:</h3>";
            echo "<form>";
                echo "<label for='nombre'>Nombre:</label>";
                echo "<input id='nombre' type='text' name='nombre'><br/>";
                echo "<label for='descripcion'>Descripción:</label>";
                echo "<input id='descripcion' type='text' name='descripcion'><br/>";
                echo "<label for='precio'>Precio:</label>";
                echo "<input id='precio' type='number' name='precio'><br/>";
                echo "<label for='estado'>Estado:</label>";
                echo "<select id='estado' name='estado'>";
                    echo "<option value='No disponible'>No disponible</option>";
                    echo "<option value='Disponible'>Disponible</option>";
                echo "</select></br>";
                echo "<label for='imagen'>Imágen(carpeta/nombreimagen.extensión):</label>";
                echo "<input id='imagen' type='text' name='imagen'><br/>";

                echo "<input type='submit'>";
            echo "</form>";

            if(isset($REQUEST['nombre']) && isset($REQUEST['descripcion']) && isset($REQUEST['precio']) && isset($REQUEST['estado']) && isset($REQUEST['imagen'])){
                $nombre=$REQUEST['nombre'];
                $descripcion=$REQUEST['descripcion'];
                $precio=$REQUEST['precio'];
                $estado=$REQUEST['estado'];
                $imagen=$REQUEST['imagen'];

                $sql="INSERT INTO `productos`(`nombre`, `descripcion`, `precio`, `estado`, `imagen`) VALUES ('$nombre','$descripcion','$precio','$estado','$imagen')";
                $conn->query($sql);
            }
        } else{
            if(empty($_SESSION['usuario']) && empty($_SESSION['contraseña'])){
                header('Location: loginadmin.php');
            } 
        }
    ?>
        
</body>
</html>