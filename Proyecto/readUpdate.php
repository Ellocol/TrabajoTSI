<!-- Esta pagina php se encarga de recoger los datos del formulario createProducto y pasarselos al .php con las funciones CRUD -->
<?php
session_start();
$numObjects = array();

include 'CRUD.php';

if (isset($_POST["enviar"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    if (isset($_POST['realizaEnvio'])) {
        $numObjects[6] = 1;
    } else {
        $numObjects[6] = 0;
    }
    $numObjects[0] = $id;
    $numObjects[1] = $nombre;
    $numObjects[2] = $precio;
    $numObjects[3] = $descripcion;
    $numObjects[4] = $categoria;


    if ($_FILES["foto"]["error"] > 0) {
        echo "ERROR";
    } else {
        $nombreTemp = $_FILES["foto"]["tmp_name"];
        $name = $_FILES["foto"]["name"];
        $tipo = $_FILES["foto"]["type"];
        $tamaño = $_FILES["foto"]["size"] / 1024;
    }

    if ($categoria == "automovil") {
        $marca = $_POST["marca"];
        $año = $_POST["año"];
        $cv = $_POST["cv"];
        $km = $_POST["km"];
        $combustible = $_POST["combustible"];
        $asientos = $_POST["asientos"];
        $puertas = $_POST["puertas"];

        $numObjects[7] = $marca;
        $numObjects[8] = $año;
        $numObjects[9] = $cv;
        $numObjects[10] = $km;
        $numObjects[11] = $asientos;
        $numObjects[12] = $combustible;
        $numObjects[13] = $puertas;
    } else if ($categoria == "ropa") {
        $tallas = "";
        if (isset($_POST['XXS'])) {
            $tallas .= $_POST['XXS'] . ";";
        }
        if (isset($_POST['XS'])) {
            $tallas .= $_POST['XS'] . ";";
        }
        if (isset($_POST['S'])) {
            $tallas .= $_POST['S'] . ";";
        }
        if (isset($_POST['M'])) {
            $tallas .= $_POST['M'] . ";";
        }
        if (isset($_POST['L'])) {
            $tallas .= $_POST['L'] . ";";
        }
        if (isset($_POST['XL'])) {
            $tallas .= $_POST['XL'] . ";";
        }
        if (isset($_POST['XXL'])) {
            $tallas .= $_POST['XXL'] . ";";
        }
        $numObjects[7] = $tallas;
    }
} else {
    echo "ERROR";
}


$extension = explode(".", $name);

$origen = $nombreTemp;
$destino = "fotos/" . $name;

$numObjects[5] = $destino;
move_uploaded_file($origen, $destino);

updateProducto($numObjects);
?>