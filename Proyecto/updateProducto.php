<!DOCTYPE html>
<html>
    <head> 
        <script src="Framework/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="Validaciones.js" type="text/javascript"></script>
        <!--<link rel="icon"  href="gt.ico" type="image/x-icon" />-->
        <link href="css.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title></title>
        <?php
        session_start();
        include 'CRUD.php';
        if (isset($_POST["btnActualizar"])) {
            $id = $_POST["producto"];

            $producto = obtenerDatosProducto($id);
        }else if($_POST["btnEliminar"]){
            
        }
        ?>

        <script>
            $(document).ready(function () {
                var clase = "<?php echo $producto[4]; ?>";
                if (clase == "automovil") {
                    element = document.getElementById("categoriaID");
                    element.value = clase;
                    validarCategoria("categoriaID");
                    rellenarCategoria();
                } else if (clase == "ropa") {
                    element = document.getElementById("categoriaID");
                    element.value = clase;
                    validarCategoria("categoriaID");
                    rellenarCategoria();
                } else if (clase == "electronica") {
                    element = document.getElementById("categoriaID");
                    element.value = clase;
                    validarCategoria("categoriaID");
                } else if (clase == "ocio") {
                    element = document.getElementById("categoriaID");
                    element.value = clase;
                    validarCategoria("categoriaID");
                }
            });

            function rellenarCategoria() {

                $(document).ready(function () {

                    categoria = document.getElementById("categoriaID");
                    dato = categoria.value;
<?php if ($producto[4] == "automovil") { ?>
                        if (dato == "automovil") {
                            marca = document.getElementById("marcaID");
                            fabricacion = document.getElementById("añoID");
                            cv = document.getElementById("cvID");
                            km = document.getElementById("kmID");
                            asientos = document.getElementById("asientosID");
                            combustible = document.getElementById("combustibleID");
                            puertas = document.getElementById("puertasID");
                            marca.value = "<?php echo $producto[9]; ?>";
                            fabricacion.value = "<?php echo $producto[10]; ?>";
                            cv.value = "<?php echo $producto[11]; ?>";
                            km.value = "<?php echo $producto[12]; ?>";
                            asientos.value = "<?php echo $producto[13]; ?>";
                            combustible.value = "<?php echo $producto[14]; ?>";
                            puertas.value = "<?php echo $producto[15]; ?>";
                        }


<?php } ?>





                });
            }
        </script>
    </head>
    <body>
        <fieldset>
            <legend>PRODUCTO</legend>
            <form action="readUpdate.php" method="post" enctype="multipart/form-data" >
                <input type="number" name="id" value="<?php echo $producto[0]; ?>" hidden>
                Nombre del producto: <input type="text" name="nombre" value="<?php echo $producto[1]; ?>" onchange="validarString(id)" id="nombreID" placeholder="Nombre Producto" required/><span id="nombreIDError" class="errores"></span><br><br>
                Precio del producto: <input type="number" name="precio" onchange="validarNumero(id)" id="precioID" value="<?php echo $producto[2]; ?>" required/><span id="precioIDError" class="errores"></span><br><br>
                Descripci&oacute;n del producto:<br><textarea name="descripcion" onchange="validarDescripcion(id)" id="descripcionID" placeholder="Descripci&oacute;n" required><?php echo $producto[3]; ?></textarea><span id="descripcionIDError" class="errores"></span><br><br>
                Categor&iacute;a:<select name="categoria" onChange="validarCategoria(id)"  id="categoriaID" required >
                    <option value="-" id="-">-</option>
                    <option value="automovil" >Autom&oacute;vil</option>
                    <option value="ropa" >Ropa</option>
                    <option value="electronica" >Electr&oacute;nica</option>
                    <option value="ocio" >Ocio</option>
                </select><span id="categoriaIDError" class="errores"></span><br><br>
                Foto: <input type="file" onchange="validarFoto(id)" id="fotoID" name="foto"required><span id="fotoIDError" class="errores"></span><br><br>
                ¿Realiza el env&iacute;o?:<input type="checkbox" name="realizaEnvio" value="realizaEnvio"><br><br> 
                <input type="submit" onclick="return validarSubmit()" value="Actualizar" name="enviar"/>
            </form>
        </fieldset>
    </body>
</html>
