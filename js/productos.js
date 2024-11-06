str = ''
function crearTicket(id, nombre, precio, desc){
    cont = 1
    if(!document.getElementById("a"+id)){
        str += "<tr>"
        str += "<td><button id='a" + id + "' class='btn btn-success btn-sm' onclick='sumarproducto(" + id + ")'>+</button>" + " " + "<button id='e" + id + "' class='btn btn-danger btn-sm' onclick='restar()'>X</button> </td>"
        str += "<td>"+ nombre +"</td>"
        str += "<td id='cant" + id + "'>"+ cont +"</td>"
        str += "<td id='precio" + id + "'>"+ precio +"</td>"                
        str += "<td id='descuento" + id + "'>"+ desc +"</td>"
        if(desc == 0){
            str += "<td id='final" + id + "'>"+ precio +"</td>"  
        }else{
            str += "<td id='final" + id + "'>"+Math.round(precio/desc+precio, -1)+"</td>"
        }                
        str += '</tr>'       
        document.getElementById("ticket").innerHTML = str
    } else {
        alert("Añadalo desde el otro lado")
    }

}

function sumarproducto(id){
document.getElementById('form_ticket').addEventListener("submit", function(event){
    event.preventDefault();
})
let productolocal = document.getElementById("cant" + id);
contador = parseInt(productolocal.textContent);
contador++
productolocal.innerHTML = contador;
descuento_total = 0
if(parseInt(document.getElementById("descuento"+id).textContent) != 0){
    descuento_total = parseInt(document.getElementById("descuento"+id).textContent) * 0.01
}
document.getElementById("final" + id).innerHTML = (contador * parseInt(document.getElementById("precio" + id).textContent) - descuento_total)
}

function restar(){

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