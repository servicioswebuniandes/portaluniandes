jQuery(document).ready(function($){
	$("#creditcard-form").validate({
		rules: {
			payer_names: {
				required: true,
				lettersonly: true
			},
			payer_client_type: {
				selectone: true
			},
			payer_doc_type: {
				selectone: true
			},
			payer_docnum: {
				required: true,
				minlength: 6,
				digits: true
			},
			payer_phone: {
				required: true
			},
			payer_bank: {
				selectone: true
			}
		},
		submitHandler: function(form){
            $("#load-img").show();
            $("#creditcard-form").hide();
			console.log('form ok');
			return true;
        },
		messages: {
			payer_names: {
				required: "* El campo no puede estar vacío",
				lettersonly: "* Ingrese únicamente letras"
			},
			payer_client_type: {
				selectone: "* Seleccione una opción",
			},
			payer_doc_type: {
				selectone: "* Seleccione una opción",
			},
			payer_docnum: {
				required: "* El campo no puede estar vacío",
			},
			payer_phone: {
				required: "* El campo no puede estar vacío",
			},
			payer_bank: {
				selectone: "* Seleccione una opción",
			}
		},
		errorPlacement: function ( error, element ) {
			error.addClass( "ui red pointing label transition" );
			//error.insertAfter( element.parent() );
			error.insertAfter( element );
		},
		highlight: function ( element, errorClass, validClass ) {
			jQuery( element ).parents( ".row" ).addClass( errorClass );
		},
		unhighlight: function (element, errorClass, validClass) {
			jQuery( element ).parents( ".row" ).removeClass( errorClass );
		}
		
	});		
});