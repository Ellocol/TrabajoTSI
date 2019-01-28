<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_POST['btnLogin'])) {
            $con = mysqli_connect("localhost", "root", "");
            if (!$con) {
                die("Error en la conexion" . mysqli_errno($con));
            }

            $db_selected = mysqli_select_db($con, "tienda");
            if (!$db_selected) {
                die("Error en la conexion" . mysqli_errno($con));
            }
            $nombre = $_POST['nickname'];
            $contraseña = $_POST['password'];

            $sentencia = "SELECT `id`, `nickname`,`password` FROM usuarios WHERE `nickname` ='" . $nombre . "' AND `password` ='" . $contraseña . "'";
            $result = mysqli_query($con, $sentencia);
            $fila = mysqli_fetch_array($result);

            $_SESSION['nombre'] = $fila['nickname'];
            $_SESSION['id'] = $fila['id'];

            header("Location: mostrarProductos.php");
        }
        ?>

        <form action="#" method="post">

            Nickname: <input type="text" name="nickname"/><br><br>
            Password: <input type="text" name="password"/><br><br>
            <input type="submit" name="btnLogin" value="Login"/>


        </form>
    </body>
</html>
