jQuery(document).ready( function () {

  jQuery.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test( value );
  }

  jQuery.validator.methods.number = function (value, element) {
    return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
  }

  jQuery("#phone").keydown(function(event) {
   if(event.shiftKey)
   {
    event.preventDefault();
  }

  if (event.keyCode == 46 || event.keyCode == 9)    {
  }
  else {
    if (event.keyCode < 95) {
      if (event.keyCode < 48 || event.keyCode > 57) {
        event.preventDefault();
      }
    } 
    else {
      if (event.keyCode < 96 || event.keyCode > 105) {
        event.preventDefault();
      }
    }
  }
});


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
    required:"Este campo es obligatorio",
    lettersonly:"Solo se permiten letras",
    minlength: "Mínimo 5 caracteres "
  },
  email:{
    email:"Escriba un email valido",
    required:"Este campo es obligatorio",
  },
  phone:{
    required:"Este campo es obligatorio",
    number: "Solo se permiten números",
    minlength: "Número móvil invalido",
    min: "El número móvil no puede ser 0",
  },
  accept_terms:{
    required:"Este campo es obligatorio",
  },
}
});
});
