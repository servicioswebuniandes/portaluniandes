jQuery(document).ready( function () {

  jQuery.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test( value );
  }

  jQuery.validator.methods.number = function (value, element) {
    return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
  }

//   jQuery("#phone").keydown(function(event) {
//    if(event.shiftKey)
//    {
//     event.preventDefault();
//   }

//   if (event.keyCode == 46 || event.keyCode == 9)    {
//   }
//   else {
//     if (event.keyCode < 95) {
//       if (event.keyCode < 48 || event.keyCode > 57) {A
//         event.preventDefault();
//       }
//     } 
//     else {
//       if (event.keyCode < 96 || event.keyCode > 105) {
//         event.preventDefault();
//       }
//     }
//   }
// });

var language=document.documentElement.lang;
if(language=='es'){
  var obligatorio="Este campo es obligatorio";
  var soloLetras="Solo se permiten letras";
  var soloNumeros="Solo se permites números";
  var emailValido="Ingrese un correo válido";
  var minLength="Mínimo 5 caracteres";
  var validNumber="Número inválido";
}else{
  var obligatorio="This field is required";
  var soloLetras="Only letters are allowed";
  var soloNumeros="Only numbers are allowed";
  var emailValido="Type a valid email";
  var minLength="At least 5 characters";
  var validNumber="Invalid phone number";
}


  jQuery("#contactForm").validate({

    errorElement: 'span',
    errorPlacement: function(error, element) {
      if(element.parent('.form-check').length) {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    },

    rules: {
      last_name: {
        required: true,
        minlength: 5,
      },
      phone: {
       required: true,
       number: true,
       minlength: 7,
       min: 3
     },
     accept_terms: {
      required: true
    },
    email: {
      required: true,
      email: true
    }
  },


  messages: {

   last_name:{
    required:obligatorio,
    lettersonly:soloLetras,
    minlength: minLength
  },
  email:{
    email:emailValido,
    required:obligatorio,
  },
  phone:{
    required:obligatorio,
    number: soloNumeros,
    minlength: validNumber,
    min: validNumber,
  },
  accept_terms:{
    required:obligatorio,
  },
}
});
});
