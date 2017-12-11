jQuery(window).resize(function(){

	if(jQuery(window).width()<=640 && jQuery('.item-slide-for-detail-institucional-mobile article').length > 1 && !jQuery('.item-slide-for-detail-institucional-mobile article').hasClass('slick-slide')){


		jQuery('.item-slide-for-detail-institucional-mobile').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			arrows: true,
			fade: true,
		});

	}else{

		if (jQuery('.item-slide-for-detail-institucional-mobile article').hasClass('slick-slide')) {
			jQuery('.item-slide-for-detail-institucional-mobile').slick('unslick');
		}

	}


});

jQuery( document ).ready(function() {

/* Color Noticias */

	jQuery(".news_type_0.images_type_0.news_destacada_1.news-highlighted-1 > section").parent().parent().parent().parent().addClass("color_1")

	/* Tabs - Maestra 5 */

	jQuery('.list-tabs .tab-content').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.list-tabs .nav-tabs',
		responsive: [
		{
			breakpoint: 550,
			settings: {
				dots: true
			}
		}
		]
	});

	jQuery('.list-tabs .nav-tabs').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.list-tabs .tab-content',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		infinite: false,
		responsive: [
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: false
			}
		},
		{
			breakpoint: 550,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false
			}
		}
		]
	});
	

	if(jQuery(window).width()<=640){
		if(jQuery('.item-slide-for-detail-institucional-mobile article').length > 1) {
			jQuery('.item-slide-for-detail-institucional-mobile').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true,
				arrows: true,
				fade: true,
			});

		}
	}


	if(jQuery('.slide-for-detail-institucional article').length != 1) {
		jQuery('.slide-for-detail-institucional').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			arrows: true,
			fade: true,
			asNavFor: '.slide-nav-detail-institucional'
		});

		jQuery('.slide-nav-detail-institucional').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			asNavFor: '.slide-for-detail-institucional',
			dots: false,
			centerMode: false,
			focusOnSelect: true,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 6,
					infinite: false,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 5,
					infinite: false,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: false,
				}
			}
			]
		});
	}

	jQuery('.list-testimonials-institucional').slick({
		infinite: false,
		dots: false,
		arrows: true,
		vertical: true,
		slidesToShow: 3,
		speed: 2000,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: false,
				dots: true,
				speed: 300
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				vertical: false,
				dots: true,
				speed: 300,
				adaptiveHeight: true
			}
		}
		]
	});

	jQuery('.views_publications').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			}
		}
		]
	});

	jQuery('.views_events').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 550,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			}
		}
		]
	});

	jQuery('.list_featured_news').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 550,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: true
			}
		}
		]
	});

	jQuery('.views_notice').slick({
		dots: true
	});

	jQuery('.block-views-slider-home-block').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 6000,
	});

	if (jQuery(window).width() >= 767){
		jQuery('.views_accreditation').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true,
			autoplay: true,
			autoplaySpeed: 6000,
		});
	}

	if (jQuery(window).width() >= 991){
		jQuery('.views_accreditation').slick("unslick");
	}
});
