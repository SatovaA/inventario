// FUNCIÓN PARA ACTUALIZAR CANTIDAD Y PRECIO DE PRODUCTOS DEL CARRO DE COMPRAS
function updateQuantity(value, id) {
    var price = $('#priceValue_'+id).val();
    var total = value * price;
    var formatTotal = formatNumber(total)

    $.ajax({
        url: 'update_row_cart/' + id + '/' + value,
        type: 'GET',
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#textPrice_'+id).html('$ '+formatTotal);
            $('#textTotal').html('$ '+formatNumber(response.total));
        },
        statusCode: {
            404: function () {
                console.log('web not found');
            }
        },
        error: function (x, xs, xt) {
            //nos dara el error si es que hay alguno
            console.log((x))
            //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });

}

// FUNCIÓN PARA ELIMINAR PRODUCTOS DEL CARRO DE COMPRAS
function deleteProduct(id) {

    $.ajax({
        url: 'delete_row_cart/' + id,
        type: 'GET',
        dataType: "json",
        success: function (response) {
            $("#row_cart_" + id).remove();
        },
        statusCode: {
            404: function () {
                console.log('web not found');
            }
        },
        error: function (x, xs, xt) {
            //nos dara el error si es que hay alguno
            console.log((x))
            //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
}





