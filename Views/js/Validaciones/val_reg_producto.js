function Val_reg_producto() {
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
