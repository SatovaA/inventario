$("#saveProduct").on('click',function(){
    $("#formProduct").validate({

        rules: {
            name: {
                required: true,
                maxlength: 255,
            },

        },
        messages: {
            name: {
                required: "El campo nombre producto es requerido",
                maxlength: "Solo se permite máximo {0} caracteres",
            },

        }

    });


});
