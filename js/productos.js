function eliminarProducto(id) {
    if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
    $.ajax({
        url: 'eliminarproducto.php',
        data: { 'eliminar':'verificar', 'id': id },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
           if(data['error'] == 1){
            alert(data['mensaje']);
           }
           else{
            alert(data['mensaje']);
           }
        }
    });
}
}