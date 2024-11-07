$(document).ready(function () {
$.ajax({
    url: 'traer_info.php',
    data: { 'data': 'marcas'},
    type: 'POST',
    dataType: 'json',
    success: function (data) {
        str = '';

        for( i = 0; i< data.length; i++){
           str += "<option value ='"+data[i]['id']+"'>"+data[i]['nombre']+ "</option>";
        }
            
        $('#marca_opcion').html(str);
    }
});
$.ajax({
    url: 'traer_info.php',
    data: { 'data': 'descuentos'},
    type: 'POST',
    dataType: 'json',
    success: function (data) {
        str = '';

        for( i = 0; i< data.length; i++){
            str += "<option value ='"+data[i]['id']+"'>"+data[i]['nombre']+ "</option>";
         }

        $('#desc_opcion').html(str);
    }
});
$.ajax({
    url: 'traer_info.php',
    data: { 'data': 'proveedores'},
    type: 'POST',
    dataType: 'json',
    success: function (data) {
        str = '';
        for( i = 0; i< data.length; i++){
            str += "<option value ='"+data[i]['id']+"'>"+data[i]['nombre']+ "</option>";
         }

        $('#prov_opcion').html(str);
        $('#prov_opcion2').html(str);
    }
});
});