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
	history.pushState(null, null, data);

	var scroll=jQuery('#'+data).offset().top;

	if( jQuery(window).width() > 767 ){
		jQuery('body,html').animate({scrollTop:scroll - jQuery('.navbar-default').height()});
	}else{
		jQuery('body,html').animate({scrollTop:scroll - 20});
	}

	return false;
}
jQuery(document).ready(function(){
	/*--------------------------------------------SLides---------------------------------------------------*/
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
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		adaptiveHeight: true,
		
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
	


// Menú 

if(jQuery(window).width() > 767){
	jQuery('.navbar-nav li').hover(function(){
		if(jQuery(this).find('ul').find('li').length){
			jQuery(this).toggleClass('open');
		}
	});
}
jQuery('.navbar-header .navbar-toggle').click(function(e){
	jQuery('body').toggleClass('menu-open');
});

jQuery('.navbar-nav .icon-mobile').click(function(e){
	if(jQuery(this).parent().find('ul').find('li').length){
		jQuery(this).parent().addClass('open-mobile');

		jQuery('.container-search').addClass('search-close');
		jQuery('#navbar').addClass('nav-open');
	}
});

jQuery( ".navbar-toggle" ).click(function(e){
	var elemt=jQuery(this).attr('aria-expanded')
	if( elemt == 'true' ){
		jQuery('.dropdown.open-mobile').removeClass('open-mobile');
	}
});

jQuery('.dropdown .dropdown-menu a').click(function(){
	jQuery('.dropdown.open-mobile').removeClass('open-mobile');

	jQuery('.container-search').removeClass('search-close');
	jQuery('#navbar').removeClass('nav-open');
	jQuery('body').removeClass('menu-open');
	jQuery('.navbar-collapse').removeClass('in');
	jQuery('.navbar-toggle').attr('aria-expanded','false');


})

jQuery('.icon-close').click(function(e){
	jQuery(this).parent().parent().removeClass('open-mobile');

	jQuery('.container-search').removeClass('search-close');
	jQuery('#navbar').removeClass('nav-open');
});

var stickyOffset = jQuery('.navbar-default').offset().top;

jQuery(window).scroll(function(){
	var sticky = jQuery('.navbar-default'),
	scroll = jQuery(window).scrollTop();

	if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
	else sticky.removeClass('navbar-fixed-top');
});

jQuery('.navbar-nav li').bind("touchstart", function(e){
	e.stopPropagation();
        'use strict'; //satisfy code inspectors
        var link = jQuery(this); //preselect the link

        if(link.find('ul').find('li').length){
        	if (link.hasClass('open')) {
        		return true;
        	} else {
        		if(jQuery(window).width() > 767){
        			link.addClass('open');
        			jQuery('.navbar-nav li').not(this).removeClass('open');
        			e.preventDefault();
					return false; //extra, and to make sure the function has consistent return points
				}else{
					return true;
				} 
			}
		}
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