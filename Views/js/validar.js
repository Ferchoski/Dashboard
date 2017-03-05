function tabla() {
    var id = document.getElementById('1').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("qwe").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "../dashboard/Views/Container/Crud/Productos/v_con_producto.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("&codigo=" + id);
}

function loadLog() {
    var id = document.getElementById('1').value;
    var nom = document.getElementById('2').value;
    var stock = document.getElementById('3').value;
    var precio = document.getElementById('4').value;
    var cantidad = document.getElementById('5').value;

    var estado = document.getElementById('6').selectedIndex;
    var marca = document.getElementById('7').selectedIndex;
    var cat = document.getElementById('8').selectedIndex;
    var talla = document.getElementById('9').selectedIndex;

    if (id == null || id.length == 0 || /^\s+$/.test(id)) {
        alert("Campo identificacion esta vacio");
        return false;
    } else if (id.length > 11) {
        alert("Campo identificacion supera los 11 caracteres");
        return false;
    } else if (nom == null || nom.length == 0 || /^\s+$/.test(nom)) {
        alert("Campo nombre del producto esta vacio");
        return false;
    } else if (stock == null || stock.length == 0 || /^\s+$/.test(stock)) {
        alert("Campo stock minimo del producto esta vacio");
        return false;
    } else if (precio == null || precio.length == 0 || /^\s+$/.test(precio)) {
        alert("Campo precio del producto esta vacio");
        return false;
    } else if (cantidad == null || cantidad.length == 0 || /^\s+$/.test(cantidad)) {
        alert("Campo cantidad del producto esta vacio");
        return false;
    } else if (estado == null || estado == 0) {
        alert("Seleccione un estado");
        return false;
    } else if (marca == null || marca == 0) {
        alert("Seleccione una marca");
        return false;
    } else if (cat == null || cat == 0) {
        alert("Seleccione una categoria");
        return false;
    } else if (talla == null || talla == 0) {
        alert("Seleccione una talla");
        return false;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("qwe").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "../dashboard/Views/Container/Crud/Productos/v_producto.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("codigo=" + id + "&nombre=" + nom + "&stock=" + stock + "&precio=" + precio + "&cantidad=" + cantidad + "&estado=" + estado + "&marca=" + marca + "&categoria=" + cat + "&talla=" + talla);
    }
}

function Val_r_usuarios() {
    var id = document.getElementById('1').value;
    var tipo_doc = document.getElementById('2').selectedIndex;
    var nom = document.getElementById('3').value;
    var apell = document.getElementById('4').value;
    var tel_fijo = document.getElementById('5').value;
    var contra = document.getElementById('6').value;
    var contra2 = document.getElementById('7').value;
    var email = document.getElementById('8').value;
    var tel_movil = document.getElementById('9').value;
    var direc = document.getElementById('10').value;
    var rol = document.getElementById('11').selectedIndex;
    var esta = document.getElementById('12').selectedIndex;

    if (id == null || id.length == 0 || /^\s+$/.test(id)) {
        alert("Campo identificacion esta vacio");
        return false;
    } else if (id.length > 11) {
        alert("Campo identificacion supera los 11 caracteres");
        return false;
    } else if (tipo_doc == null || tipo_doc == 0) {
        alert("Seleccione un tipo de documento");
        return false;
    } else if (nom == null || nom.length == 0 || /^\s+$/.test(nom)) {
        alert("El campo nombre esta vacio");
        return false;
    } else if (apell == null || apell.length == 0 || /^\s+$/.test(apell)) {
        alert("El campo apellido esta vacio");
        return false;
    } else if (tel_fijo == null || tel_fijo.length == 0 || /^\s+$/.test(tel_fijo)) {
        alert("El campo telefono fijo esta vacio");
        return false;
    } else if (contra == null || contra.length == 0 || /^\s+$/.test(contra)) {
        alert("El campo contraseña esta vacio");
        return false;
    } else if (contra2 == null || contra2.length == 0 || /^\s+$/.test(contra2)) {
        alert("El campo de repeticion de contraseña esta vacio");
        return false;

    } else if (contra != contra2) {
        alert("La contraseña no coincide");
        return false;
    } else if (email == null || email.length == 0 || /^\s+$/.test(email)) {
        alert("El campo email esta vacio");
        return false;
    } else if (tel_movil == null || tel_movil.length == 0 || /^\s+$/.test(tel_movil)) {
        alert("El campo de telefono movil esta vacio");
        return false;
    } else if (direc == null || direc.length == 0 || /^\s+$/.test(direc)) {
        alert("El campo de direccion esta vacio");
        return false;
    } else if (rol == null || tipo_doc == 0) {
        alert("Seleccione un rol");
        return false;
    } else if (esta == null || esta == 0) {
        alert("Seleccione un estado");
        return false;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("qwe").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "../dashboard/Views/Container/Crud/Productos/v_producto.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("codigo=" + id + "&nombre=" + nom + "&stock=" + stock + "&precio=" + precio + "&cantidad=" + cantidad + "&estado=" + estado + "&marca=" + marca + "&categoria=" + cat + "&talla=" + talla);

    }
