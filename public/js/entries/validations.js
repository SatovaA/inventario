$("#saveProduct").on('click',function(){
    $("#formProduct").validate({

        rules: {
            quantity: {
                required: true,
                number: true,
            },
            lot_number: {
                required: true,
                number: true
            },
            expiration_date: {
                required: true,
            },
            price: {
                required: true,
                number: true,
            },

        },
        messages: {
            quantity: {
                required: "El campo cantidad es requerido",
                number:'Solo se permite números'
            },
            lot_number: {
                required: "El campo número de lote es requerido",
                number:'Solo se permite números'
            },
            expiration_date: {
                required: "El campo fecha vencimiento es requerido",
            },
            price: {
                required: "El campo precio es requerido",
                number:'Solo se permite números'
            },

        }

    });


});
