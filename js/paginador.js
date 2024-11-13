var prueba = [];
var pagActual = 1;
var mostrarRegistros = 5;
var numeroTotPag = 0;
var offset = 0;

$(document).ready(function () {
    $.ajax({
        url: 'traer_info.php',
        data: { 'data': 'productos' },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            prueba = data;
            var elementosTot = data.length;
            
            function actualizarNumeroTotPag() {
                var productosFiltrados = filtrarProductos($('#searchInput').val());
                numeroTotPag = Math.ceil(productosFiltrados.length / mostrarRegistros);
                $('#cant_productos').html(productosFiltrados.length); 
            }

            function filtrarProductos(searchTerm) {
                if (!searchTerm) {
                    return prueba;
                }
                return prueba.filter(function (producto) {
                    return producto.nombre.toLowerCase().includes(searchTerm.toLowerCase()) ||
                        producto.descripcion.toLowerCase().includes(searchTerm.toLowerCase());
                });
            }
            
            function mostrarRegistrosPagina() {
                var productosFiltrados = filtrarProductos($('#searchInput').val()); 
                var registrosHTML = '<table class="table table-bordered"><thead><tr>' +
                    '<th>Agregar</th>' +
                    '<th>Producto</th>' +
                    '<th>Marca</th>' +
                    '<th>Descuento</th>' +
                    '<th>Descripción</th>' +
                    '<th>Precio</th>' +
                    '<th>Cantidad</th>' +
                    '</tr></thead><tbody>';

                var elementosTot = productosFiltrados.length;
             
                actualizarNumeroTotPag();
                
                for (var i = offset; i < offset + mostrarRegistros && i < elementosTot; i++) {
                    registrosHTML += `<tr>
                        <td><button id="añadir${productosFiltrados[i].id}" onclick="crearTicket(${productosFiltrados[i].id},'${productosFiltrados[i].nombre}',${productosFiltrados[i].precio},${productosFiltrados[i].descuento},${productosFiltrados[i].cant})"> + </button></td>
                        <td> ${productosFiltrados[i].nombre} </td>
                        <td> ${productosFiltrados[i].marca} </td>
                        <td> ${productosFiltrados[i].descuento} </td>
                        <td> ${productosFiltrados[i].descripcion} </td>
                        <td> ${productosFiltrados[i].precio} </td>
                        <td> ${productosFiltrados[i].cant} </td>
                    </tr>`;
                }

                registrosHTML += '</tbody></table>';
                $('#productos').html(registrosHTML);
            }
            
            function generarPaginacion() {
                var paginacionHTML = '';
                var productosFiltrados = filtrarProductos($('#searchInput').val()); 
                var elementosTot = productosFiltrados.length;

                numeroTotPag = Math.ceil(elementosTot / mostrarRegistros);

                if (pagActual > 1) {
                    paginacionHTML += '<a href="#" class="prev" data-page="' + (pagActual - 1) + '">Anterior</a>';
                }

                for (var i = 1; i <= numeroTotPag; i++) {
                    if (i === pagActual) {
                        paginacionHTML += '<span class="page current">' + i + '</span>';
                    } else {
                        paginacionHTML += '<a href="#" class="page" data-page="' + i + '">' + i + '</a>';
                    }
                }

                if (pagActual < numeroTotPag) {
                    paginacionHTML += '<a href="#" class="next" data-page="' + (pagActual + 1) + '">Siguiente</a>';
                }

                $('#paginacion').html(paginacionHTML);
            }

            mostrarRegistrosPagina();
            generarPaginacion();

            $('#searchInput').on('keyup', function () {
                offset = 0; 
                pagActual = 1;
                mostrarRegistrosPagina();
                generarPaginacion();
            });

            $(document).on('click', '.page, .prev, .next', function (e) {
                e.preventDefault();
                var page = $(this).data('page');
                if (page !== pagActual) {
                    pagActual = page;
                    offset = (pagActual - 1) * mostrarRegistros;
                    mostrarRegistrosPagina();
                    generarPaginacion();
                }
            });
        }
    });
});
