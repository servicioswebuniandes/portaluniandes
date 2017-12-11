var w_screen = jQuery(window).width();
var socialContent;
var offset;
var h_menu;
var stopScroll;
var h_footer;
var h_new;
var h_box;

function footer() {
	h_footer = jQuery(".item-footer.quick-links .item-footer-x2").height() + 100;
	jQuery(".item-footer").css({"height": h_footer+"px"});
}



jQuery(document).ready(function(){

	/* Seleccionar Idioma */
	
	jQuery('.styled-select').click(function() {
		jQuery('.styled-select ul').toggle();
	});

	jQuery('.styled-select ul li').click(function() {
		location.href=jQuery(this).attr('data-url');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.idioma-select').html(jQuery(this).attr('data-leng'))
	});

	var valor="/"+Drupal.settings.swflang;
	if(valor=='/es') {
		jQuery('.idioma-select').html('Esp');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery('.styled-select ul li:first-child').addClass('active')
	}
	else {
		jQuery('.idioma-select').html('Eng');
		jQuery('.styled-select ul li').removeClass('active');
		jQuery('.styled-select ul li:last-child').addClass('active')
	}


	/* Menú  - Iconos menú mobile */

	if(jQuery(window).width() <= 991){
		var li = jQuery(".nav.navbar-nav > li");
		jQuery.each(li, function(i, val){
			var thisUl = jQuery(val).find("> ul");
			if(thisUl.length == 0){
				jQuery(val).find("> span").hide();
				jQuery(val).find("> a").css("width", "100%");
			}

		})
	}else{
		setTimeout(function(){
			var this_li = jQuery(".nav.navbar-nav > li");
			jQuery.each(this_li, function(i, val){
				var this_ul = jQuery(val).find("ul > li > ul");			
				if(this_ul.length == 0){
					jQuery(val).find(">ul > li > span").hide();
				}
			})
		},1000);
	}


	jQuery(".navbar-header .navbar-toggle").click(function() {
		var parent = jQuery(".navbar-header .navbar-toggle").parent().parent().parent(); 
		if(jQuery(parent).hasClass("open")){
			jQuery(parent).removeClass("open");
		}else{
			jQuery(parent).addClass("open");
		}
	});

	if(jQuery(window).width() > 991) {
		jQuery(function(){
			/*jQuery('.dropdown').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.dropdown').mouseenter(function(){
				jQuery(this).addClass('open');
			});
			jQuery('.dropdown').mouseout(function(){
				jQuery(this).removeClass('open');
			});
			jQuery('.dropdown > a').click(function(e){
			});*/
			jQuery( ".navbar-default #navbar ul.navbar-nav > .nav-item" )
		  .mouseenter(function() {
		   console.log('entra');
		   jQuery(this).addClass('open');
		  })
		  .mouseleave(function() {
		  	jQuery(this).removeClass('open');
		   console.log('sale');
		  });
		});

		jQuery(function(){
			jQuery('.dropdown-submenu').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.dropdown-submenu > a').click(function(e){
			});
		});

		jQuery(function(){
			jQuery('.item-submenu').hover(function() {
				jQuery(this).toggleClass('open');
			});
			jQuery('.item-submenu > a').click(function(e){
			});
		});
	}

	jQuery('.navbar-nav .icon-mobile').click(function(e){
		if(jQuery(this).parent().find('ul').find('li').length){
			jQuery(this).parent().addClass('open-menu');
		}

		if (!jQuery(this).hasClass('ico-back')) {
			jQuery(this).addClass('ico-back');
		}
		else {
			var flag = 0;

			flag = 1;
			if (flag == 1) {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().removeClass('open-menu');
					jQuery(this).removeClass('ico-back');
					flag = 0;
				}
			}
			else {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().addClass('open-menu');
					jQuery(this).addClass('ico-back');
				}
			}
		}
	});


	jQuery('.multi-level .icon-mobile').click(function(e){
		if(jQuery(this).parent().parent().find('ul').find('li').length){
			jQuery(this).parent().parent().addClass('open-submenu');
		}

		if (!jQuery(this).parent().hasClass('ico-back')) {
			jQuery(this).parent().addClass('ico-back');
		}
		else {
			var flag = 0;

			flag = 1;
			if (flag == 1) {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().removeClass('open-submenu');
					jQuery(this).parent().removeClass('ico-back');
					flag = 0;
				}
			}
			else {
				if(jQuery(this).parent().find('ul').find('li').length){
					jQuery(this).parent().addClass('open-submenu');
					jQuery(this).addClass('ico-back');
				}
			}
		}
	});


	/* Menú */

	var stickyOffset = jQuery('.navbar-default').offset().top;



	jQuery(window).scroll(function(){
		var sticky = jQuery('.navbar-default'),
		scroll = jQuery(window).scrollTop();

		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
		else sticky.removeClass('navbar-fixed-top');
	});

	jQuery(window).scroll(function(){
		var sticky = jQuery('.navbar-top'),
		scroll = jQuery(window).scrollTop();

		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
		else sticky.removeClass('navbar-fixed-top');
	});


	jQuery(window).scroll(function(){
		var sticky = jQuery('#menu-soy'),
		scroll = jQuery(window).scrollTop();

		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
		else sticky.removeClass('navbar-fixed-top');
	});

	jQuery(window).scroll(function(){
		var sticky = jQuery('#faculty-menu'),
		scroll = jQuery(window).scrollTop();

		if (scroll > stickyOffset) sticky.addClass('navbar-fixed-top');
		else sticky.removeClass('navbar-fixed-top');
	});


	/* Submenú 2 nivel */

	jQuery.each(jQuery(".nav.navbar-nav > li > ul > li > ul"),function(i, val){
		if(jQuery(val).find("li").length == 0){
			jQuery(val).parent().find(".submenu").remove();
		}
	});

	/* Submenu 3 nivel */

	jQuery.each(jQuery(".nav.navbar-nav > li > ul > li > ul > li > ul"),function(i, val){
		if(jQuery(val).find("li").length == 0){
			jQuery(val).parent().find(".submenu_level").remove();
		}
	});


	/* Buscador */

	jQuery('#btn-seeker').click(function(e){
		e.preventDefault();
		jQuery('#btn-seeker').parent().toggleClass('_close');
		jQuery('.container-seeker').toggleClass('open-seeker');
	});



	/* Footer */

	jQuery(".item-footer.quick-links").height();
});
