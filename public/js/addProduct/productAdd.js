$(document).ready(function () {
    // FUNCIÓN PARA AGREGAR PRODUCTO AL CARRO DE COMPRAS
    $("#add_product").click(function (event) {
        var button = this;
        // console.log(this);

        var idDetailProduct = $("#idDetailProduct").val();
        var quantityNew = $("#quantity").val();
        var priceNew = $("#price").val();

        if (idDetailProduct!="" &&  quantityNew != "" &&  priceNew != "" ) {

            if (quantityNew>0) {

                var url = "add_product/__product__";
                url = url.replace('__product__',idDetailProduct);
                url += "?quantityNew="  + quantityNew;
                url += "&priceNew="  + priceNew;

                window.location.href = url;

            }else{
                alert("No se puede agregar este producto por que esta agotado en el almacén");
            }

        }else{
            alert("No puede agregar al carrito existen campos vacios. Porfavor verifique los campos");
        }
    })
});

//FUNCIÓN PARA CAMBIAR EL PRECIO ACORDE A EL TAMAÑO DEL PRODUCTO
function detailProduct() {
    var size = $("#size_id:checked").val();
    var discount = $("#discount").val();

    $.ajax({
        url: '../consult_detail_product_shop/' + size,
        type: 'GET',
        dataType: "json",
        success: function (response) {
            if(discount != ''){
                var total = (discount * response.price)/100;
                var price = response.price - total;

                $('#priceReal').html('$ ' + formatNumber(response.price))
                $('#price').html('$ ' + formatNumber(price))
                $('#valuePrice').val(price)
            }else{
                $('#price').html('$ ' + formatNumber(response.price))
                $('#valuePrice').val(response.price)
            }

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



