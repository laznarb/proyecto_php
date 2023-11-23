<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INICIA SESIÓN PARA REALIZAR TU PEDIDO</h1>
    <form action="pedido.php" method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input id="usuario" type="text" name="usuario"><br/>
        <label for="contraseña">contraseña:</label>
        <input id="contraseña" type="password" name="contraseña"><br/>

        <input type="submit">
    </form>
    <?php
        if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            include('conexion.php');

            $sql = "SELECT usuario, contraseña FROM clientes WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                session_start();
                header('Location: pedido.php');
            } else {
                header('Location: loginpedido.php');
            }
        }
    ?>
</body>
</html>