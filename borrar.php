<?php
    if(isset($_REQUEST['idborrar'])){
        $idBorrar = $_REQUEST['idborrar'];

        include('conexion.php')

        $sql = "delete from productos where id=$idBorrar";
        $conn->query($sql);
        $conn->close();
        session_start();
        $_SESSION['mensaje'] = 'Producto borrado';
        header('Location: admin.php');
    }
?>