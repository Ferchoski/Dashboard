$(document).ready(function() {
    $('.home').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/home.html");
    });

    $('#pro').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Productos/producto.php");
    });

    $('#ven').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Ventas/ventas.html");
    });

    $('#ent').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Entradas/entradas.html");
    });

    $('#ped').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Pedidos/pedidos.html");
    });

    $('#eve').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Publicaciones/eventos.html");
    });

    $('#not').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Publicaciones/noticias.html");
    });

    $('#prom').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Publicaciones/promociones.html");
    });



    $('#usu').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Usuarios/r_usuario.php");
    });

    $('#c_usu').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Usuarios/con_usuario.php");
    });

    $('#prov').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Proveedores/proveedores.html");
    });

    $('#c_pro').click(function() {
        $(".abc").load("../dashboard/Views/Container/Crud/Productos/con_producto.php");
    });
});
