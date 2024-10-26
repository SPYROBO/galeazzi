function ManejarInfo(type) {
    const stock_bajo = document.getElementById('stock_bajo');
    const prove_info = document.getElementById('info_proveedores');
    const reponer = document.getElementById('reponer_stock');
    const contenido = document.getElementById('contenido_stock');

    switch(type){
        case "prove_info":
            prove_info.classList.remove('d-none');
            contenido.classList.add('d-none');
            reponer.classList.add('d-none');
            stock_bajo.classList.add('d-none');
            break;
        case "stock_bajo":
            stock_bajo.classList.remove('d-none');
            contenido.classList.add('d-none');
            reponer.classList.add('d-none');
            prove_info.classList.add('d-none');
            break;
        case "reponer_stock":
            reponer.classList.remove('d-none');
            stock_bajo.classList.add('d-none');
            contenido.classList.add('d-none');
            prove_info.classList.add('d-none');
            break;
        case "contenido":
            contenido.classList.remove('d-none');
            reponer.classList.add('d-none');
            stock_bajo.classList.add('d-none');
            prove_info.classList.add('d-none');
            break;
    }
}