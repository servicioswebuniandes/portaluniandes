jQuery(document).ready(function($){
	//parametriza el tipo de tarjeta según el número ingresado
	$('#card').validateCreditCard(function(result){
		cardTypes = ['VISA', 'DINERS', 'AMEX', 'MASTERCARD'];
		for(i = 0; i < cardTypes.length; i++){
			_type = cardTypes[i];
			//if(_type == 'AMEX') _type = 'american_express';
			$('#card').parent().removeClass('type-'+_type);
		}
		
		if(result.card_type == null){
			$('#cardtype').val('');
		}else{
			name = result.card_type.name;
			$('#cardtype').val(name);
			//if(name == 'AMEX') name2 = 'american_express';
			$('#card').parent().addClass('type-'+name);
			//configura el CCV
			$('#ccv').removeClass('ccv-3 ccv-4');
			if(name == 'AMEX'){
				$('#ccv').addClass('ccv-4');
			}else{
				$('#ccv').addClass('ccv-3');
			}
		}
		if(!result.valid){
			$('#card').removeClass("valid");
		}else{
			$('#card').addClass("valid");
		}
	});
	
	
	$("#creditcard-form").validate({
		groups: {
			expdate: "payer_cardmonth payer_cardyear"
		},
		rules: {
			payer_names: {
				required: true,
				lettersonly: true
			},
			payer_docnum: {
				required: true,
				minlength: 6,
				digits: true
			},
			payer_card: {
				required: true,
				ccardnumber: true
			},
			payer_cardmonth: {
				selectone: true,
				cardexpdate: true
			},
			payer_cardyear: {
				selectone: true,
				cardexpdate: true
			},
			payer_ccv: {
				required: true,
				digits: true,
				validateccv: true
			},
			payer_installments: {
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
			payer_docnum: {
				required: "* El campo no puede estar vacío",
				minlength: "* Debe contener mínimo 6 caracteres",
				digits: "* Ingrese únicamente números"
			},
			payer_card: {
				required: "* El campo no puede estar vacío"
			},
			payer_ccv: {
				required: "* El campo no puede estar vacío",
				digits: "* Ingrese únicamente números"
			},
			payer_cardyear: {
				selectone: "* Seleccione una fecha"
			},
			payer_cardmonth: {
				selectone: "* Seleccione una fecha"
			},
			payer_installments: {
				selectone: "* Seleccione el número de cuotas"
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