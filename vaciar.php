<?php
    session_start();
    unset($_SESSION['guardados']);
    header("Location: carrito.php");
?>