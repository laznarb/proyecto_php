<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <style>
        body{
            background-image: url(imagenes/fondo.jpg);
        }
        input{
            width: 100%;
            padding: 12px 20px;
            margin: 5px;
            box-sizing: border-box;
        }
        
    </style>
</head>
<body>
    <h1>INTRODUZCA SUS CREDENCIALES DE ADMINISTRACIÓN</h1>
        <form action="#" method="POST">
            <label for="usuario">Nombre de usuario:</label>
            <input id="usuario" type="text" name="usuario"><br/>
            <label for="contraseña">Contraseña:</label>
            <input id="contraseña" type="password" name="contraseña"><br/>

            <input type="submit">
        </form>
    <?php
        if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            include('conexion.php');

            $sql = "SELECT id, usuario, contraseña FROM administradores WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
            $result = $conn->query($sql);

            $row = $result -> fetch_assoc();
            $id=$row['id'];
            if ($result->num_rows > 0) {
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['contraseña']=$contraseña;
                header('Location: admin.php');
            } else {
                header('Location: loginadmin.php');
            }
        }
    ?>
</body>
</html>