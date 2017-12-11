$(function() {
  var $donateform = $( '#donateform' );
  $donateform.formToWizard({
    submitButton: 'btn-form',
    nextBtnClass: 'btn-default next',
    prevBtnClass: 'btn-default prev',
    buttonTag:    'button',

    validateBeforeNext: function(form, step) {
      var stepIsValid = true;
      var validator = form.validate();
      $(':input', step).each( function(index) {
        var xy = validator.element(this);
        stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
      });
      return stepIsValid;
    },
    progress: function (i, count) {
      $('.progress-complete').width(''+(i/count*100)+'%');
    }
  });


  jQuery("#step0").css('display', 'block');

  jQuery('#step0Next').click(function(){
   if (jQuery("#step0").css('display')=="none" && jQuery("#step1").css('display')=="block"){
    jQuery('ul.step_form li.s2').addClass('active');
    jQuery('ul.step_form li.s1').removeClass('active');
  }
  else {
    jQuery('ul.step_form li.s1').addClass('active');
  }    
});

  jQuery('#step1Next').click(function(){ 
    var valorParent=jQuery( "#valor" ).parent().find("#valor-error");  
    if (jQuery("#step1").css('display')=="none" && jQuery("#step2").css('display')=="block"){
      if(valorParent.length==0){
        jQuery('ul.step_form li.s2').removeClass('active');
        jQuery('ul.step_form li.s3').addClass('active');
      }
    }
    else {
      jQuery('ul.step_form li.s2').addClass('active');
    }
  });

  jQuery('#step1Prev').click(function(){
    jQuery('ul.step_form li.s3').removeClass('active');
  });


  $("#step1Prev").bind( "click", function() {
   jQuery('ul.step_form li.s1').addClass('active');
   jQuery('ul.step_form li.s2').removeClass('active');
   jQuery("#step2").hide();
   jQuery("#step1").hide();
   jQuery("#valor").removeClass("error");
   jQuery("#valor").parent().find("#valor-error").remove();
 })


  $("#step2Prev" ).bind( "click", function() {
    jQuery('ul.step_form li.s2').addClass('active');
    jQuery('ul.step_form li.s1').removeClass('active');
    jQuery('ul.step_form li.s3').removeClass('active');
    jQuery("#step0").hide();
    jQuery("#step2").hide();
  })


  jQuery('ul.step_form li.s2  p.info-step-txt').addClass('hidden');
  jQuery(this).addClass('hidden');

  jQuery('ul.step_form li.s3  p.info-step-txt').addClass('hidden');
  jQuery(this).addClass('hidden');


  $( "#step0Next, #step1Next, #step1Prev , #step2Prev" ).bind( "click", function() {

    if (jQuery("#step0").css('display')=="block"){
     parent.resizeIframeStep0();
     jQuery('ul.step_form li.s1 .info-step-txt').removeClass('hidden');
     jQuery('ul.step_form li.s2 .info-step-txt').addClass('hidden');
     jQuery('ul.step_form li.s3 .info-step-txt').addClass('hidden');
   }

   if (jQuery("#step0").css('display')=="none" && jQuery("#step1").css('display')=="block"){
     parent.resizeIframe();
     jQuery("#step1Prev").css('display','block');
     jQuery(".step-next").hide();
     jQuery('ul.step_form li.s1 .info-step-txt').addClass('hidden');
     jQuery('ul.step_form li.s2 .info-step-txt').removeClass('hidden');
     jQuery('ul.step_form li.s3 .info-step-txt').addClass('hidden');
   }

   if (jQuery("#step1").css('display')=="none" && jQuery("#step2").css('display')=="block"){
     parent.resizeIframeStep();
     jQuery("#step2Prev").css('display','block');
     jQuery(".step-next-2").hide();
     jQuery('ul.step_form li.s1 .info-step-txt').addClass('hidden');
     jQuery('ul.step_form li.s2 .info-step-txt').addClass('hidden');
     jQuery('ul.step_form li.s3 .info-step-txt').removeClass('hidden');
   }


   if (jQuery("#step2").css('display')=="block"){
     jQuery( ".btn-step-final" ).show();
   }
   else{
     jQuery( ".btn-step-final" ).hide();
   }
 })

  jQuery("#nombres_").change(function(){
    var texto=$("#nombres_").val();
    $("#nombres").val(texto);
  })
  jQuery("#apellidos_").change(function(){
    var texto=$("#apellidos_").val();
    $("#apellidos").val(texto);
  })            
  jQuery("#correo_").change(function(){
    var texto=$("#correo_").val();
    $("#correo").val(texto);
  })
});




$(document).ready(function(){

  if (jQuery("#step0").css('display')=="block"){
   parent.resizeIframeStep0();
 }

// //Solo Acepta números en el Input
// $("#valor").keydown(function(event) {
//  if(event.shiftKey)
//  {
//   event.preventDefault();
// }

// if (event.keyCode == 46 || event.keyCode == 9)    {
// }
// else {
//   if (event.keyCode < 95) {
//     if (event.keyCode < 48 || event.keyCode > 57) {
//       event.preventDefault();
//     }
//   } 
//   else {
//     if (event.keyCode < 96 || event.keyCode > 105) {
//       event.preventDefault();
//     }
//   }
// }
// });



jQuery("#tipoDocumentoIdentificacion").change(function(){
  var rec=$(this).val();

  if(rec=="1"){
    $("#documento").keydown(function(event) {
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
  }
});


jQuery("#recurrence").change(function(){
  var rec=$(this).val();
  if(rec=="M"){
    $("#duration").show();
  }
  else{
    $("#duration").hide();
  }

});

jQuery("#don_forma_pago").change(function(){
  var valor=$(this).val();
  if (valor=="CONS"){
    $( "#recurrence option" ).remove( );
    $("#recurrence").append("<option value='U' >Único pago</option>")
    $("#duration").hide();
    $("#recurrence").show();
  }else{
   $( "#recurrence option" ).remove( );
   $("#recurrence").append("<option value='' disabled selected >Seleccione la recurrencia</option>")
   $("#recurrence").append("<option value='U' >Único pago</option>")
   $("#recurrence").append("<option value='M' >Mensual</option>")
   $("#duration").hide();
   $("#recurrence").show();
 }

});



$.validator.methods.email = function( value, element ) {
  return this.optional( element ) || /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test( value );
}

$.validator.methods.number = function (value, element) {
  return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
}

$.validator.methods.lettersonly = function (value, element) {
  return this.optional(element) || /^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]*$/.test(value);
}

jQuery('input.value').keyup(function(event) {
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".")
    ;
  });
});




function replaceAll( text, busca, reemplaza ){

  while (text.toString().indexOf(busca) != -1)
    text = text.toString().replace(busca,reemplaza);
  return text;

}

jQuery("#valor").on("change paste keyup", function() {
 var valor=jQuery(this).val();  
 var test= replaceAll(valor,".","");
 jQuery("#val_value").val(test);

});

function valMonto(){
  var abc=jQuery("#val_value").val();
  if(abc > 30000000){
    var valorParent=jQuery( "#valor" ).parent().find("#valor-error");
    jQuery( "#valor" ).addClass("error");
    if(valorParent.length==0){
      jQuery( "#valor" ).parent().append("<span id='valor-error' class='error' style='display:block;'>Monto invalido, valor máximo $30.000.000</span>");
    }
    else{
      jQuery( "#valor" ).parent().find("#valor-error").html("Monto invalido, valor máximo $30.000.000");
    }
  }
  else if(abc<=9999){
    var valorParent=jQuery( "#valor" ).parent().find("#valor-error");
    jQuery( "#valor" ).addClass("error");
    if(valorParent.length==0){
      jQuery( "#valor" ).parent().append("<span id='valor-error' class='error' style='display:block;'>Monto invalido, valor mínimo $10.000</span>");
    }
    else{
      jQuery( "#valor" ).parent().find("#valor-error").html("Monto invalido, valor mínimo $10.000");
    }
  }
  else{
    jQuery( "#valor" ).removeClass("error");
    jQuery( "#valor" ).parent().find("#valor-error").remove();
  }
}

jQuery("#valor").keyup(function() {
  valMonto();
});

jQuery("#step0Next").click(function(){
  if(jQuery("#val_value").val()!=""){
    valMonto();
  }
});

$("#donateform").validate({

  errorElement: 'span',
  errorPlacement: function(error, element) {
    if(element.parent('.item-form-check').length) {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element);
    }
  },

  rules: {
    documentoIdentificacion: {
      required: true,
      minlength: 5
    },
    telefono: {
      required: true,
      number: true,
      minlength: 7,
      min: 1
    },
    telefonoMovil: {
     required: true,
     number: true,
     minlength: 10,
     min: 3
   },
   don_accept_terms: {
    required: true
  },
  emailComprador: {
    required: true,
    email: true
  },
  nombreComprador: {
    lettersonly: true
  },
  apellidoComprador: {
    lettersonly: true
  }
},

messages: {

 nombreComprador:{
  required:"Este campo es obligatorio",
  lettersonly:"Solo se permiten letras",
},
apellidoComprador:{
  required:"Este campo es obligatorio",
  lettersonly:"Solo se permiten letras",
},
emailComprador:{
  email:"Escriba un email valido",
  required:"Este campo es obligatorio",
},
designacion:{
  required:"Debe seleccionar una de las opciones listadas",
},
forma_pago:{
  required:"Debe seleccionar una de las opciones listadas",
},
frecuencia:{
  required:"Debe seleccionar una de las opciones listadas",
},
duracionM:{
  required:"Debe seleccionar una de las opciones listadas",
},
tipoDocumentoIdentificacion:{
  required:"Debe seleccionar una de las opciones listadas",
},
documentoIdentificacion:{
  required:"Este campo es obligatorio",
  minlength: "Número de documento invalido",
  number: "Solo se permiten números "
},
nombres:{
  required:"Este campo es obligatorio",
  lettersonly:"Solo se permiten letras",
},
apellidos:{
  required:"Este campo es obligatorio",
  lettersonly:"Solo se permiten letras",
},
correo:{
  email:"Escriba un email valido",
  required:"Este campo es obligatorio",
},
don_country:{
  required:"Debe seleccionar una de las opciones listadas",
},
don_depto:{
  required:"Debe seleccionar una de las opciones listadas",
},
don_city:{
  required:"Debe seleccionar una de las opciones listadas",
},
direccionCorrespondencia:{
  required:"Este campo es obligatorio",
},
telefono:{
  required:"Este campo es obligatorio",
  number: "Solo se permiten números",
  minlength: "Número de telefono invalido",
  min: "El número de telefono no puede ser 0",
},
telefonoMovil:{
  required:"Este campo es obligatorio",
  number: "Solo se permiten números",
  minlength: "Número Móvil invalido",
  min: "El número móvil no puede ser 0",
},
don_accept_terms:{
  required:"Este campo es obligatorio",
},
}
});
});
