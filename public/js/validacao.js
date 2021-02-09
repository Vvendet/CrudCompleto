$().ready(function() {
    $('#form_cadastro').validate({
        rules: {
            nome: {
                required: true
            },
            preco: {
                required: true
            },
            quantidade: {
                required: true
            },
            descricao: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        messages: {
            nome: {
                required: "Este campo não pode ser vazio"
            },
            preco: {
                required: "Este campo não pode ser vazio",
            },
            quantidade: {
                required: "Este campo não pode ser vazio",
            },
            descricao: {
                required: "Este campo não pode ser vazio",
            }
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        number: "Entre com um número válido.",
    });
});