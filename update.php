<?php

if(isset($_REQUEST['idmodificar'])){
    $idmodificar = $_REQUEST['idmodificar'];

    include('conexion.php');
     $sql = "UPDATE productos set estado='No disponible' where id=$idmodificar";
    $conn->query($sql);
    
    $conn->close();
    session_start();
    $_SESSION['mensaje'] = 'Producto modificado';
    header('Location: admin.php');
}
?>