<?php

function createProducto($parametros) {


    $con = mysqli_connect("localhost", "root", "", "tienda");

    if (!$con) {
        die("FALLO CONEXION" . mysqli_connect_error());
    }

    $usuario = $_SESSION["id"];


    $consulta = "INSERT INTO productos VALUES (DEFAULT,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $consulta);
    mysqli_stmt_bind_param($stmt, "sisssii", $parametros[0], $parametros[1], $parametros[2], $parametros[3], $parametros[4], $parametros[5], $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($parametros[3] == "automovil") {
        $consulta = "SELECT `id` FROM productos WHERE `nombre_producto` ='" . $parametros[0] . "' AND `precio` ='" . $parametros[1] . "' AND `clase` ='" . $parametros[3] . "'";
        $result = mysqli_query($con, $consulta);
        $id = mysqli_fetch_array($result);
        $consulta = "INSERT INTO automovil VALUES (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
        mysqli_stmt_bind_param($stmt, "isiiiisi", $id['id'], $parametros[6], $parametros[7], $parametros[8], $parametros[9], $parametros[10], $parametros[11], $parametros[12]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    if ($parametros[3] == "ropa") {
        $consulta = "SELECT `id` FROM productos WHERE `nombre_producto` ='" . $parametros[0] . "' AND `precio` ='" . $parametros[1] . "' AND `clase` ='" . $parametros[3] . "'";
        $result = mysqli_query($con, $consulta);
        $id = mysqli_fetch_array($result);
        $consulta = "INSERT INTO ropa VALUES (?,?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $consulta);
        mysqli_stmt_bind_param($stmt, "is", $id['id'], $parametros[6]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($con);

    header("location: mostrarProductos.php");
}

function leerProductosUsuario($id) {

    $productos = array();
    $i = 0;
    $con = mysqli_connect("localhost", "root", "", "tienda");

    if (!$con) {
        die("FALLO CONEXION" . mysqli_connect_error());
    }

    $consulta = "SELECT nombre_producto,clase,id FROM productos WHERE usuario_id = '" . $id . "'";

    $result = mysqli_query($con, $consulta);

    if (mysqli_num_rows($result))
        while ($fila = mysqli_fetch_array($result)) {
            $productos[$i] = $fila;
            $i++;
        }
    mysqli_close($con);
    return $productos;
}

function obtenerDatosProducto($id) {
    $productos = array();


    $con = mysqli_connect("localhost", "root", "", "tienda");

    if (!$con) {
        die("FALLO CONEXION" . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM productos WHERE id = '" . $id . "'";

    $result = mysqli_query($con, $consulta);

    if (mysqli_num_rows($result))
        $fila = mysqli_fetch_array($result);


    $productos[0] = $fila["id"];
    $productos[1] = $fila["nombre_producto"];
    $productos[2] = $fila["precio"];
    $productos[3] = $fila["descripcion"];
    $productos[4] = $fila["clase"];
    $productos[5] = $fila["foto"];
    $productos[6] = $fila["envia"];
    $productos[7] = $fila["usuario_id"];

    if ($productos[4] == "automovil") {

        $consulta = "SELECT * FROM automovil WHERE id_Producto = '" . $id . "'";
        $result = mysqli_query($con, $consulta);
        if (mysqli_num_rows($result))
            $fila = mysqli_fetch_array($result);

        $productos[8] = $fila["id_Producto"];
        $productos[9] = $fila["marca"];
        $productos[10] = $fila["fabricacion"];
        $productos[11] = $fila["cv"];
        $productos[12] = $fila["kilometros"];
        $productos[13] = $fila["asientos"];
        $productos[14] = $fila["combustible"];
        $productos[15] = $fila["puertas"];
    } else if ($productos[4] == "ropa") {

        $consulta = "SELECT * FROM ropa WHERE id_Producto = '" . $id . "'";
        $result = mysqli_query($con, $consulta);
        if (mysqli_num_rows($result))
            $fila = mysqli_fetch_array($result);

        $productos[8] = $fila["id_Producto"];
        $productos[9] = $fila["talla"];
    }

    mysqli_close($con);
    return $productos;
}

function updateProducto($parametros) {
    $con = mysqli_connect("localhost", "root", "", "tienda");

    if (!$con) {
        die("FALLO CONEXION" . mysqli_connect_error());
    }

    $consulta = "UPDATE productos SET nombre_producto='" . $parametros[1] . "' ,precio='" . $parametros[2] . "', descripcion='" . $parametros[3] . "' ,clase='" . $parametros[4] . "' ,foto='" . $parametros[5] . "' ,envia ='" . $parametros[6] . "' WHERE id=" . $parametros[0] . "";

    $result = mysqli_query($con, $consulta);

    if ($parametros[4] == "automovil") {
        $consulta = "UPDATE automovil SET marca='" . $parametros[7] . "' ,fabricacion='" . $parametros[8] . "', cv='" . $parametros[9] . "' ,kilometros='" . $parametros[10] . "' ,asientos='" . $parametros[11] . "' ,combustible ='" . $parametros[12] . "' ,puertas='" . $parametros[13] . "' WHERE id_Producto=" . $parametros[0] . "";
        $result = mysqli_query($con, $consulta);
        echo $con->error;
    } else if ($parametros[4] == "ropa") {
        $consulta = "UPDATE ropa SET talla='" . $parametros[7] . "' WHERE id_Producto=" . $parametros[0] . "";
        $result = mysqli_query($con, $consulta);
        echo $con->error;
    }
    mysqli_close($con);
}

function removeProducto($id) {
    $con = mysqli_connect("localhost", "root", "", "tienda");

    if (!$con) {
        die("FALLO CONEXION" . mysqli_connect_error());
    }

    $consulta = "DELETE FROM productos WHERE id='" . $id . "'";
    $result = mysqli_query($con, $consulta);

    echo $con->error;
    mysqli_close($con);
    return $result;
}

?>
