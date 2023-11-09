<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mi carrito de la compra</h1>
    <?php
        if(isset($REQUEST_['id'])){
            $idcarrito=$_REQUEST['idcarrito'];
        }

        include('conexion.php');

        
    ?>
</body>
</html>