lista = []
cont = 1
function crearTicket(id, nombre, precio, desc, cantidad){
    if(!document.getElementById(id)){
        str = ''
        str += "<tr id='fila"+id+"'>"
        str += "<td id='" + id + "'><button id='a" + id +"' class='btn btn-success btn-sm' onclick='sumarproducto(" + id + "," + cantidad + ")'>+</button>" + " " + "<button id='e" + id + "' class='btn btn-danger btn-sm' onclick='restar(" + id + ")'>X</button> </td>"
        str += "<td id='nom"+id+"'>"+ nombre +"</td>"
        str += "<td id='cant" + id + "'>"+ cont +"</td>"
        str += "<td id='precio" + id + "'>"+ precio +"</td>"                
        str += "<td id='descuento" + id + "'>"+ desc +"</td>"
        if(desc == 0){
            str += "<td id='final" + id + "'>"+ precio +"</td>"  
        }else{
            str += "<td id='final" + id + "'>"+Math.round(precio - 0.01 * desc * precio, -1)+"</td>"
        }                
        str += '</tr>'
        lista.push(str)
        str = ''
        for (let i of lista){
            str += i
        }       
        document.getElementById("ticket").innerHTML = str
        
    } else {
        alert("Añadalo desde el otro lado")
    }

}

function sumarproducto(id, cantidad_total){
document.getElementById('form_ticket').addEventListener("submit", function(event){
    event.preventDefault();
})
let productolocal = document.getElementById("cant" + id);
contador = parseInt(productolocal.textContent);
contador++
if(contador <= cantidad_total){
    comparacion = "fila"+id
    medida = comparacion.length
    productolocal.innerHTML = contador;
    for(i = 0; i < lista.length; i++){
        busqueda = lista[i].search('cant'+id)
        if(busqueda != -1){
            reemplazante = lista[i].replace(`'cant${id}'>${contador-1}`,`'cant${id}'>${contador}`)
            lista.splice(i,1,reemplazante)
        }
    }
    descuento_total = 0
    if(parseInt(document.getElementById("descuento"+id).textContent) != 0){
        descuento_total = parseInt(document.getElementById("descuento"+id).textContent) * 0.01
    }
    document.getElementById("final" + id).innerHTML = Math.round(contador * parseInt(document.getElementById("precio" + id).textContent) - descuento_total * parseInt(document.getElementById("precio" + id).textContent), -1)
} else {
    contador--
}

}

function restar(id){
    document.getElementById('form_ticket').addEventListener("submit", function(event){
        event.preventDefault();
    })
    let productolocal = document.getElementById("cant" + id);
    contador = parseInt(productolocal.textContent);
    contador--
    productolocal.innerHTML = contador;
    if(contador > 0){
        descuento_total = 0
        for(i = 0; i < lista.length; i++){
            busqueda = lista[i].search('cant'+id)
            if(busqueda != -1){
                reemplazante = lista[i].replace(`'cant${id}'>${contador+1}`,`'cant${id}'>${contador}`)
                lista.splice(i,1,reemplazante)
            }
        }
        if(parseInt(document.getElementById("descuento"+id).textContent) != 0){
        descuento_total = parseInt(document.getElementById("descuento"+id).textContent) * 0.01
        }
        document.getElementById("final" + id).innerHTML = (contador * parseInt(document.getElementById("precio" + id).textContent) - descuento_total * parseInt(document.getElementById("precio" + id).textContent))
    } else {
        comparacion = "fila"+id
        medida = comparacion.length
        for(i = 0; i < lista.length; i++){
            if(lista[i].slice(8,8+medida) == "fila"+id){
                lista.splice(i,1)
            }
        }
        document.getElementById("fila"+id).remove()

    }
    
}

function compra_efectuada(){
    document.getElementById('form_ticket').addEventListener("submit", function(event){})
    ticket_completo = []
    ticket = document.querySelector('#ticket')
    contador = 0
    ticket_lista = {}
    filas = ticket.querySelectorAll('td')
    filas.forEach(function(fila){
        switch(contador){
                case 0: 
                    ticket_lista.id = fila.id
                    contador++
                    break;
                case 1:
                    ticket_lista.nombre = document.getElementById(fila.id).textContent
                    contador++
                    break;
                case 2:
                    ticket_lista.cantidad = document.getElementById(fila.id).textContent
                    contador++
                    break;
                case 3:
                    ticket_lista.precio = document.getElementById(fila.id).textContent
                    contador++
                    break;
                case 4:
                    ticket_lista.descuento = document.getElementById(fila.id).textContent
                    contador++
                    break;
                case 5:
                    ticket_lista.precio_final = document.getElementById(fila.id).textContent
                    contador = 0
                    ticket_completo.push(ticket_lista)
                    ticket_lista = {}
                    break;
        }

    });
    $.ajax({
        url: 'compra_efectuada.php',
        data: {'ticket':ticket_completo},
        type: 'POST',
        dataType: 'json',
        success: function (data) {
        }
    });
}

function cambiarCant(id ,cantidad, producto) {
    let valor = prompt("Por favor, ponga la cantidad ingresante del producto: " + producto );

    if (valor !== null && !isNaN(valor) && valor > 0) {
        valor = parseInt(valor)+ cantidad;
        $.ajax({
            url: 'actualizar_stock_bajo.php',
            type: 'POST',
            data: { 
                'update': 'valorSuma', 
                'cantidad': valor, 
                'id': id 
            },
            dataType: 'json',
            success: function (data) {
                console.log (data.id)
                console.log (data.cantidad)
                if (data.error == 1) {
                    alert("Se actualizó el stock correctamente.");
                     window.location.href = 'http://localhost/galeazzi/php/stock_direccion.php?page=stockBajo'
                } else {
                    alert("No se pudo realizar la actualización.");
                }
            },
            error: function (xhr, status, error) {
                console.log("Error:", xhr.responseText);
                alert("Hubo un error en la solicitud. Por favor, intenta nuevamente.");
            }
        });
    } else if (valor === null) {
        alert("No ingresaste ninguna cantidad.");
    } else {
        alert("Por favor, ingresa un número válido mayor a 0.");
     }
}

setTimeout(function() {
    var alertMessage = document.getElementById('alert-message');
    if (alertMessage) {
        alertMessage.style.display = 'none'; 
    }
}, 5000);

function showForm(type) {
    const productForm = document.getElementById('productForm');
    const providerForm = document.getElementById('providerForm');
    const marcaForm = document.getElementById('marcaForm');
    const descForm = document.getElementById('descForm');

    switch (type) {
        case 'product':
            productForm.classList.remove('d-none');
            providerForm.classList.add('d-none');
            marcaForm.classList.add('d-none');
            descForm.classList.add('d-none');
        break;
        case 'provider':
            providerForm.classList.remove('d-none');
            productForm.classList.add('d-none');
            marcaForm.classList.add('d-none');
            descForm.classList.add('d-none');
            break;
        case 'marca':
            marcaForm.classList.remove('d-none');
            providerForm.classList.add('d-none');
            productForm.classList.add('d-none');
            descForm.classList.add('d-none');
            break;
        case 'descuento':
            providerForm.classList.add('d-none');
            productForm.classList.add('d-none');
            marcaForm.classList.add('d-none');
            descForm.classList.remove('d-none');
            break;
    }
}