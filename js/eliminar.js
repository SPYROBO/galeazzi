function eliminarProducto(id) {
    if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
    $.ajax({
        url: 'eliminarproducto.php',
        data: { 'eliminar':'verificar', 'id': id },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if(data['error']== 1){
                alert("Realizado")
            }
            else{
                alert("No se pudo realizar")
            }
        }
    });
}
}
function eliminarProveedor(id, id_produc) {
    if (confirm("¿Estás seguro de que quieres eliminar este proveedor?")) {
    $.ajax({
        url: 'eliminarproveedor.php',
        data: { 'eliminar':'verificar', 'idprov': id, 'id_produc': id_produc },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if(data['error']== 1){
                window.location.href = 'stock_direccion.php';
                alert("Realizado")
            }
            else{
                alert("No se pudo realizar")
            }
        }
    });
}
}
function cerrarSesion(){
    if (confirm("¿Estás seguro de querer cerrar sesión?")) {
        $.ajax({
            url: 'logout.php',
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if(data['error']== 1){
                    window.location.href = '../index.php';
                }
                else{
                    alert("No se pudo realizar")
                }
            }
        });
    }
}