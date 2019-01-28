<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action='updateProducto.php' method='post'>
            <?php
            session_start();
            include 'CRUD.php';
            if (isset($_SESSION["id"])) {
                

                $productos = leerProductosUsuario($_SESSION["id"]);

                echo "Productos:<select name=producto id='producto'>";
                for ($i = 0; $i < count($productos); $i++) {
                    echo "<option value=" . $productos[$i]["id"] . ">" . $productos[$i]["nombre_producto"] . "</option>";
                }
                echo "</select>";
            }
            ?>
            <input type='submit' name="btnActualizar" value='actualizar'/>

        </form>

        <form action='removeProducto.php' method='post'>

            <?php
            if (isset($_SESSION["id"])) {
                

                $productos = leerProductosUsuario($_SESSION["id"]);

                echo "Productos:<select name=producto id='producto'>";
                for ($i = 0; $i < count($productos); $i++) {
                    echo "<option value=" . $productos[$i]["id"] . ">" . $productos[$i]["nombre_producto"] . "</option>";
                }
                echo "</select>";
            }
            ?>
            <input type='submit' name="btnEliminar" value='eliminar'/>
        </form>
    </body>
</html>
