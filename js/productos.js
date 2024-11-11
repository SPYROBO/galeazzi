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

function compra_cancelada(){
    if (confirm("¿Estás seguro de que quieres eliminar la compra?")) {
        window.location.href = 'ventas.php';
    }
}

function cambiarCant(id){
alert(id)
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