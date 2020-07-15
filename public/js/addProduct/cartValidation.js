$("#saveCart").on('click',function(){
    $("#formCart").validate({

        rules: {
            email: {
                required: true,
                maxlength: 255,
                email: true,
            },
            name: {
                required: true,
                maxlength: 255,
            },

        },
        messages: {
            email: {
                required: "El campo correo es requerido",
                maxlength: "Solo se permite máximo {0} caracteres",
                email: "Correo invalido ej. nombre.@dominio.co",
            },
            name: {
                required: "El campo nombres es requerido",
                maxlength: "Solo se permite máximo {0} caracteres",
            },

        }

    });


});
