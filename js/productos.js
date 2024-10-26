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

function crearTicket(id, nombre, precio, desc){
    str = ''
    cont = 1
    str += "<tr>"
    str += "<td><button id='a" + id + "' class='btn btn-info btn-sm'>+</button><button id='e" + id + "' class='btn btn-danger btn-sm'>X</button> </td>"
    str += "<td>"+ nombre +"</td>"
    str += "<td>"+ cont +"</td>"
    str += "<td>"+ precio +"</td>"                
    str += "<td>"+ desc +"</td>"
    if(desc == 0){
        str += "<td>"+ precio +"</td>"  
    }else{
        str += "<td>"+Math.round(precio/desc+precio, -1)+"</td>"
    }                
    str += '</tr>'       
    document.getElementById('ticket').innerHTML = str
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