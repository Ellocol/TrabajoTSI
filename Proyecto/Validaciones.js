function validarString(id) {

    var element = document.getElementById(id);
    var span = document.getElementById(id + 'Error');
    var dato = element.value;
    var nombre = element.name;
    var cadena = "";
    var validado = true; //booleano para saber si se ha validado correctamente.
    var regexp = /^[a-zA-ZñÑ0-9 ]+$/; //expresion regular que solo acepta numeros y letras
    while (span.hasChildNodes()) { //elimino lo que hay dentro del span si lo hubiera
        span.removeChild(span.childNodes[0]);
    }
    $(document).ready(function () {//elimino el css de los imput si lo hubiera
        $(element).css({
            border: '',
            backgroundColor: ''
        });
    });
    if (!regexp.test(dato)) {
        validado = false;
        cadena += "Error " + nombre + " del producto solo admite letras, numeros.";
        span.appendChild(document.createTextNode(cadena));
        $(document).ready(function () {
            $(element).css({//añado el css al input
                border: 'solid red 1.5px',
                backgroundColor: '#ff8080'
            });
            $(span).animate({//animacion para que el texto del error salga lento
                opacity: 1
            }, "slow");
        });
        element.value = "";
    }

    return validado;
}

function validarNumero(id) {
    var element = document.getElementById(id);
    var span = document.getElementById(id + 'Error');
    var dato = parseInt(element.value);
    var nombre = element.name;
    var cadena = "";
    var validado = true; //booleano para saber si se ha validado correctamente.
    while (span.hasChildNodes()) { //elimino lo que hay dentro del span si lo hubiera
        span.removeChild(span.childNodes[0]);
    }
    $(document).ready(function () {//elimino el css de los imput si lo hubiera
        $(element).css({
            border: '',
            backgroundColor: ''
        });
    });
    if (dato <= 0) {
        validado = false;
        cadena += "Error " + nombre + " del producto solo admite numeros mayores de 0.";
        span.appendChild(document.createTextNode(cadena));
        $(document).ready(function () {
            $(element).css({//añado el css al input
                border: 'solid red 1.5px',
                backgroundColor: '#ff8080'
            });
            $(span).animate({//animacion para que el texto del error salga lento
                opacity: 1
            }, "slow");
        });
        element.value = 0;
    }
    return validado;
}

function validarDescripcion(id) {
    var element = document.getElementById(id);
    var span = document.getElementById(id + 'Error');
    var dato = element.value;
    var validado = true; //booleano para saber si se ha validado correctamente.
    var regexp = /^[a-zA-Z0-9ñÑ,:.\n ]+$/; //expresion regular que solo acepta numeros y letras

    while (span.hasChildNodes()) { //elimino lo que hay dentro del span si lo hubiera
        span.removeChild(span.childNodes[0]);
    }
    $(document).ready(function () {//elimino el css de los imput si lo hubiera
        $(element).css({
            border: '',
            backgroundColor: ''
        });
    });
    //voy a comprobar cada cadena separada por espacio 
    if (!regexp.test(dato)) {
        validado = false;
        span.appendChild(document.createTextNode("Error en la descripción."));
        $(document).ready(function () {
            $(element).css({//añado el css al input
                border: 'solid red 1.5px',
                backgroundColor: '#ff8080'
            });
            $(span).animate({//animacion para que el texto del error salga lento
                opacity: 1
            }, "slow");
        });
        element.value = "";
    }

    return validado;
}

function validarCategoria(id) {

    var element = document.getElementById(id);
    var span = document.getElementById(id + 'Error');
    var dato = element.value;
    var formCoche = document.getElementById("divCoche");
    var formRopa = document.getElementById("divRopa");
    var validado = true; //booleano para saber si se ha validado correctamente.
    while (span.hasChildNodes()) { //elimino lo que hay dentro del span si lo hubiera
        span.removeChild(span.childNodes[0]);
    }
    $(document).ready(function () {//elimino el css de los imput si lo hubiera
        $(element).css({
            border: '',
            backgroundColor: ''
        });
    });
    if (formCoche != null) {
        $(document).ready(function () {
            $(formCoche).remove();
        });
    } else if (formRopa != null) {
        $(document).ready(function () {
            $(formRopa).remove();
        });
    }

    if (dato == '-') {

        validado = false;
        span.appendChild(document.createTextNode("Error la categoria debe de ser distinta a -."));
        $(document).ready(function () {
            $(element).css({//añado el css al input
                border: 'solid red 1.5px',
                backgroundColor: '#ff8080'
            });
            $(span).animate({//animacion para que el texto del error salga lento
                opacity: 1
            }, "slow");
        });
        element.value = '-';
    } else if (dato == "automovil" && formCoche == null) {

        formularioCoche();
    } else if (dato == "ropa" && formRopa == null) {
        formularioRopa();
    }

    return validado;
}

function validarFoto(id) {
    var element = document.getElementById(id);
    var span = document.getElementById(id + 'Error');
    var dato = element.value;
    var validado = true; //booleano para saber si se ha validado correctamente.
    while (span.hasChildNodes()) { //elimino lo que hay dentro del span si lo hubiera
        span.removeChild(span.childNodes[0]);
    }
    $(document).ready(function () {//elimino el css de los imput si lo hubiera
        $(element).css({
            border: '',
            backgroundColor: ''
        });
    });
    var extension = dato.split('.');
    if (extension[1] != 'png' && extension[1] != 'jpg' && extension[1] != 'jpeg') {
        validado = false;
        span.appendChild(document.createTextNode("Error las extensiones permitidas son: png, jpeg, jpg. Tenga cuidado con el nombre de la imagen."));
        $(document).ready(function () {
            $(element).css({//añado el css al input
                border: 'solid red 1.5px',
                backgroundColor: '#ff8080'
            });
            $(span).animate({//animacion para que el texto del error salga lento
                opacity: 1
            }, "slow");
        });
        element.value = null;
    }
    return validado;
}

function validarSubmit() {
    var divCoche = document.getElementById("divCoche");
    var divRopa = document.getElementById("divRopa");
    if (divCoche != null) {
        var nombre = validarString("nombreID");
        var precio = validarNumero("precioID");
        var descripcion = validarDescripcion("descripcionID");
        var foto = validarFoto("fotoID");
        var marca = validarString("marcaID");
        var cv = validarNumero("cvID");
        var km = validarNumero("kmID");
        var asientos = validarNumero("asientosID");
        var año = validarNumero("añoID");
        var puertas = validarNumero("puertasID");
        if (!nombre || !precio || !descripcion || !foto || !marca || !cv || !km || !asientos || !año || !puertas)
            return false;
        else
            return true;
    } else if (divRopa != null) {
        var nombre = validarString("nombreID");
        var precio = validarNumero("precioID");
        var descripcion = validarDescripcion("descripcionID");
        var foto = validarFoto("fotoID");
        if (!nombre || !precio || !descripcion || !foto)
            return false;
        else
            return true;
    } else {
        var nombre = validarString("nombreID");
        var precio = validarNumero("precioID");
        var descripcion = validarDescripcion("descripcionID");
        var foto = validarFoto("fotoID");
        var categoria = validarCategoria("categoriaID");
        if (!nombre || !precio || !descripcion || !categoria || !foto)
            return false;
        else
            return true;
    }

}

function formularioCoche() {
    $(document).ready(function () {
        $("#categoriaIDError").after("<div id='divCoche'><br><br>Marca:<input type='text' name='marca' id='marcaID' onchange='validarString(id)'/><span id='marcaIDError' class='errores'></span>\n\
<br><br>Año:<input type='number' value='0' name='año' id='añoID' onchange='validarNumero(id)'/><span id='añoIDError' class='errores'></span>\n\
<br><br>CV:<input type='number' value='0' name='cv' id='cvID' onchange='validarNumero(id)'/><span id='cvIDError' class='errores'></span>\n\
<br><br>KM:<input type='number' value='0' name='km' id='kmID' onchange='validarNumero(id)'/><span id='kmIDError' class='errores'></span>\n\
<br><br>Asientos:<input type='number' value='0' name='asientos' id='asientosID' onchange='validarNumero(id)'/><span id='asientosIDError' class='errores'></span>\n\
<br><br>Combustible:<select name='combustible' id='combustibleID'>\n\
<option value='gasolina98'>Gasolina 98</option>\n\
<option value='gasolina95'>Gasolina 95</option>\n\
<option value='bioetanol'>Bioetanol</option>\n\
<option value='dieselNormal'>Diésel normal</option>\n\
<option value='dieselPlus'>Diésel plus</option>\n\
<option value='biodiesel'>Biodiésel</option>\n\
<option value='hibrido'>Híbrido</option>\n\
<option value='gasNatural'>Gas natural</option>\n\
<option value='electricidad'>Electricidad</option>\n\
</select>\n\
<br><br>Puertas:<input type='number' value='0' name='puertas' id='puertasID' onchange='validarNumero(id)'/><span id='puertasIDError' class='errores'></span></div>");
        $("#divCoche").slideDown(1500);
    });
}

function formularioRopa() {
    $(document).ready(function () {
        $("#categoriaIDError").after("<div id='divRopa'><br><br>Tallas:<br>\n\
<input type='checkbox' name='XXS' class='tallas' value='XXS'/>XXS<br><br>\n\
<input type='checkbox' name='XS' class='tallas' value='XS'/>XS<br><br>\n\
<input type='checkbox' name='S' class='tallas' value='S'/>S<br><br>\n\
<input type='checkbox' name='M' class='tallas' value='M'/>M<br><br>\n\
<input type='checkbox' name='L' class='tallas' value='L'/>L<br><br>\n\
<input type='checkbox' name='XL'  class='tallas' value='XL'/>XL<br><br>\n\
<input type='checkbox' name='XXL' class='tallas' value='XXL'/>XXL<br><br>\n\
</div>");
        $("#divRopa").slideDown(1000);
    });
}