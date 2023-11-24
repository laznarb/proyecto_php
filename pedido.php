<?php
    session_start();
    
    if(isset($_SESSION['guardados']) && isset($_SESSION['id']) && isset($_SESSION['usuario'])){
        $idproductos=$_SESSION['guardados'];
        $idusuario=$_SESSION['id'];
        $usuario=$_SESSION['usuario'];

        include('conexion.php');

        $sql="INSERT INTO `pedidos`(`id_Clientes`, `usuario`) VALUES ('$idusuario','$usuario')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        }

        for($i=0; $i<count($idproductos); $i++){
            $sql="select id,precio from productos where id=$idproductos[$i]";
            $result=$conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $id=$row['id'];
                $precio=$row['precio'];
            }
            $sql="INSERT INTO `detalle_pedido`(`id_pedido`,`id_producto`, `precio_unidad`) VALUES ($last_id,$id,$precio)";
            $conn->query($sql);
            
            $conn->close();

            session_start();
            $_SESSION['mensaje'] = 'Pedido realizado con éxito';
            header('Location: carrito.php');
        }
    }
?>