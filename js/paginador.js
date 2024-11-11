prueba = ''
$(document).ready(function () {
    $.ajax({
        url: 'traer_info.php',
        data: { 'data': 'productos' },
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            var elementosTot = data.length;
            var mostrarRegistros = 2;
            var numeroTotPag = Math.ceil(elementosTot / mostrarRegistros);
            var pagActual = 1;
            var offset = (pagActual - 1) * mostrarRegistros;

            function mostrarRegistrosPagina() {
                var registrosHTML = '<table class="table table-bordered"><thead><tr>' +
                    '<th>Agregar</th>' +
                    '<th>Producto</th>' +
                    '<th>Marca</th>' +
                    '<th>Descuento</th>' +
                    '<th>Descripción</th>' +
                    '<th>Precio</th>' +
                    '<th>Cantidad</th>' +
                    '</tr></thead><tbody>';
                    prueba = data

                for (var i = offset; i < offset + mostrarRegistros && i < elementosTot; i++) {
                    registrosHTML += `<tr>
                        <td><button id="añadir${data[i].id}" onclick="crearTicket(${data[i].id},'${data[i].nombre}',${data[i].precio},${data[i].descuento},${data[i].cant})"> + </button></td>
                        <td> ${data[i].nombre} </td> 
                        <td> ${data[i].marca} </td>
                        <td> ${data[i].descuento} </td>
                        <td> ${data[i].descripcion} </td>
                        <td> ${data[i].precio} </td>
                        <td> ${data[i].cant} </td>
                        </tr>`;
                }

                registrosHTML += '</tbody></table>';
                $('#productos').html(registrosHTML);
            }

            function generarPaginacion() {
                var paginacionHTML = '';

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
