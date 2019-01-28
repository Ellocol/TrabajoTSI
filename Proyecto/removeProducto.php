<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include 'CRUD.php';

        if (isset($_POST["btnEliminar"])) {
            $id = $_POST["producto"];

            $producto = removeProducto($id);

            if ($producto)
                echo "Se ha eliminado con exito";
        }
        ?>
    </body>
</html>
