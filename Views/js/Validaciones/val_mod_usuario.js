function Val_mod_usuario() {
    var id = document.getElementById('id2').selectedIndex;
    var id3 = document.getElementById('id2').value;
    var tipo_doc = document.getElementById('2').selectedIndex;
    var nom = document.getElementById('3').value;
    var apell = document.getElementById('4').value;
    var tel_f = document.getElementById('5').value;
    var contra = document.getElementById('6').value;
    var contra2 = document.getElementById('7').value;
    var email = document.getElementById('8').value;
    var tel_m = document.getElementById('9').value;
    var direc = document.getElementById('10').value;
    var rol = document.getElementById('11').selectedIndex;
    var esta = document.getElementById('12').selectedIndex;

    if (id == null || id == 0) {
        alert("Seleccione un ID");
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
    } else if (direc == null || direc.length == 0 || /^\s+$/.test(direc)) {
        alert("El campo de direccion esta vacio");
        return false;
    } else if (rol == null || rol == 0) {
        alert("Seleccione un rol");
        return false;
    } else if (esta == null || esta == 0) {
        alert("Seleccione un estado");
        return false;
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("zxc").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "../dashboard/Views/Container/Crud/Usuarios/v_mod_usuario.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("documento=" + id3 + "&nombre=" + nom + "&apellido=" + apell + "&telefono_f=" + tel_f + "&pass=" + contra + "&email=" + email + "&telefono_m=" + tel_m + "&direccion=" + direc + "&estado=" + esta + "&t_doc=" + tipo_doc + "&rol=" + rol);

    }
}
