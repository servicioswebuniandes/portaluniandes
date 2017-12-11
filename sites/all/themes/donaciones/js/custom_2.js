function redesFixed(){
	if( jQuery('.internal-description').length != 0  ){
		if(jQuery(window).width() > 767){
			var sectionmodifi = jQuery('.social-network');
			var altoTexto=jQuery('.internal-description').height();
			var obj = jQuery(window);       //objeto sobre el que quiero detectar scroll
			var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto
			var inicioElemento=jQuery('.social-network').offset().top +  jQuery('.slider-internal-detail').innerHeight() ;
			
			jQuery(window).scroll(function(){
				var EleleftLoadu=jQuery('.internal-description').offset().left;
				var obj_act_top = jQuery(this).scrollTop();  //obtener scroll top instantaneo
				var finalElemento= jQuery('.social-network').offset().top - jQuery('.slider-internal-detail').height();
				
				if(obj_act_top > obj_top){
					if (obj_act_top  > jQuery('.social-network').offset().top - 60  && finalElemento <= altoTexto){
						sectionmodifi.css({"position": "fixed","top":"0","bottom":"auto","margin-top": "110px","left":EleleftLoadu});
					}
					else{
						if(finalElemento > altoTexto){
							sectionmodifi.css({"position": "absolute","top":"inherit","bottom":"0","margin-top": "0px","left":"0"});
						}
					}
				}
				else{

					if (obj_act_top  <  jQuery('.social-network').offset().top - 60 && obj_act_top > jQuery('.internal-description').offset().top ){
						sectionmodifi.css({"position": "fixed","top":"0","bottom":"auto","margin-top": "110px","left":EleleftLoadu});
					}else{
						if(finalElemento < altoTexto){
							sectionmodifi.css({"position": "absolute","top":"0","bottom":"auto","margin-top": "0px","left":"0"});
						}
					}
				}
				obj_top = obj_act_top; 
			})
		}
	}
}

jQuery( window ).load(function() {
	redesFixed();
});

function actualizarUrl(data,element){
	history.replaceState(null, null, data);
	history.pushState(null, null,data);

	var scroll=jQuery('#'+data).offset().top;

	if( jQuery(window).width() > 767 ){
		jQuery('body,html').animate({scrollTop:scroll - jQuery('.navbar-default').height()});
	}else{
		jQuery('body,html').animate({scrollTop:scroll - 20});
	}

	return false;
}
jQuery(document).ready(function(){
	sliderMobile();
	jQuery('.dropdown-menu li a').click(function(e){
		if( jQuery(this).attr('onclick') ){
			e.preventDefault();
		}
	})

	
	jQuery(".Banner-campanas").slick({
		dots: false,
		infinite: true,
		slidesToShow: 3,
		speed: 1000,
		slidesToShow: 3,
		slidesToScroll: 3,
		
		responsive: [
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
			}
		},
		{
			breakpoint: 900,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				dots: true,
			}
		},
		]
	});
	

// Buscador 

jQuery('.search-form #btnBuscadorMobile').click(function(e){
	e.preventDefault();
	jQuery(this).toggleClass('close');

	jQuery('.container-search').toggleClass('open-search');
});
});

jQuery(window).on('resize', function(){
	sliderMobile();
	redesFixed();
});

//Funcion sliders mobile

function sliderMobile(){
	var width = jQuery(window).width();
	if(width > 991) {
		if(jQuery('.section-Banner-mobile').hasClass('slick-initialized')){
			jQuery('.section-Banner-mobile').slick('unslick');
		}
		if(jQuery('.slider-informativo').hasClass('slick-initialized')){
			jQuery('.slider-informativo').slick('unslick');
		}
	}else{
		if(!jQuery('.section-Banner-mobile').hasClass('slick-initialized') ){
			jQuery(".section-Banner-mobile").slick({
				dots: true,
				infinite: true,
			});
		}
		if(!jQuery('.slider-informativo').hasClass('slick-initialized') ){
			jQuery(".slider-informativo").slick({
				dots: true,
				infinite: true,
			});
		}
	}	
}
