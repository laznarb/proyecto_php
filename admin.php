<?php
    if(empty($_SESSION['usuario']) && empty($_SESSION['contraseña'])){
        header('Location: index.php');
    }
?>