function eliminarProducto(id) {
    if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
    $.ajax({
        url: 'eliminarproducto.php',
        data: { 'eliminar':'verificar', 'id': id },
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

setTimeout(function() {
    var alertMessage = document.getElementById('alert-message');
    if (alertMessage) {
        alertMessage.style.display = 'none'; 
    }
}, 9000);

function showForm(type) {
    const productForm = document.getElementById('productForm');
    const providerForm = document.getElementById('providerForm');

    if (type === 'product') {
        productForm.classList.remove('d-none');
        providerForm.classList.add('d-none');
    } else {
        providerForm.classList.remove('d-none');
        productForm.classList.add('d-none');
    }
}