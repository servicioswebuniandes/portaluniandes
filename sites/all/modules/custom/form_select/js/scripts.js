
jQuery( document ).ready( function(){

jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { getdata: 3 }, function( data ){

			jQuery.each( data, function( index, value ){
				var df="";
				if(value[0]=="34"){
					df="selected";
				}
				jQuery( "#don_country" ).append( "<option "+df+" value='" + value[0] + "'>" + value[1] + "</option>" );

			} )

		}, "json" )

jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { country: "34", getdata: 1 }, function( data ){

			
			jQuery.each( data, function( index, value ){
				var df="";
				if(value[0]=="11"){
					df="selected";
				}
				jQuery( "#don_depto" ).append( "<option "+df+" value='" + value[0] + "'>" + value[1] + "</option>" );

			} )

		}, "json" )


		jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { state: "11", getdata: 2 }, function( data ){


			jQuery.each( data, function( index, value ){	
				var df="";
				if(value[0]=="11001"){
					df="selected";
				}
				jQuery( "#don_city" ).append( "<option "+df+" value='" + value[0] + "'>" + value[1] + "</option>" );

			} )

		}, "json" )





jQuery("#don_city").change(function() {
var ciudad=jQuery("#don_city option:selected").text();
jQuery("#ciudadLiteral").val(ciudad);
})

	jQuery( "#don_country" ).bind( "change", function(){

		jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { country: jQuery( this ).val(), getdata: 1 }, function( data ){

			jQuery( "#don_depto option" ).remove( );
			jQuery( "#don_city option" ).remove( );

			jQuery.each( data, function( index, value ){
				if(index==0){
					actualizar_ciudad(value[0]);
				}

				jQuery( "#don_depto" ).append( "<option value='" + value[0] + "'>" + value[1].toUpperCase() + "</option>" );

			} )

		}, "json" )
	} );

	jQuery( "#don_depto" ).bind( "change", function(){

		jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { state: jQuery( this ).val(), getdata: 2 }, function( data ){

			jQuery( "#don_city option" ).remove( );

			jQuery.each( data, function( index, value ){	
				if(index==0){
					jQuery("#ciudadLiteral").val(value[1]);
				}
				jQuery( "#don_city" ).append( "<option value='" + value[0] + "'>" + value[1].toUpperCase() + "</option>" );

			} )

		}, "json" )

	} );

	function actualizar_ciudad(valor){
		
		jQuery.post( "/sites/all/modules/custom/form_select/services/getData.php", { state: valor, getdata: 2 }, function( data ){

			jQuery( "#don_city option" ).remove( );

			jQuery.each( data, function( index, value ){	
				if(index==0){
					jQuery("#ciudadLiteral").val(value[1]);
				}
				jQuery( "#don_city" ).append( "<option value='" + value[0] + "'>" + value[1].toUpperCase() + "</option>" );

			} )

		}, "json" )
	}



		



} )
