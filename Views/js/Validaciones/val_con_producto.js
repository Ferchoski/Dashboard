function Val_con_producto() {
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
