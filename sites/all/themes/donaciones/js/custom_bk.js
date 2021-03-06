function resizeIframeStep0 (){

  if (jQuery(window).width()> 991){
    jQuery('.node-type-donar iframe').css('height', '450');
    jQuery('.node-type-causas iframe').css('height', '450');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '450');
    
  }
  else {
    jQuery('.node-type-donar iframe').css('height', '520');
    jQuery('.node-type-causas iframe').css('height', '520');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '520');
  }
}

function resizeIframe (){
  if (jQuery(window).width()> 991){
    jQuery('.node-type-donar iframe').css('height', '500');
    jQuery('.node-type-causas iframe').css('height', '500');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '500');
  }
  else {
    jQuery('.node-type-donar iframe').css('height', '640');
    jQuery('.node-type-causas iframe').css('height', '640');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '640');
  }
}

function resizeIframeStep (){
  if (jQuery(window).width() > 991){
    jQuery('.node-type-donar iframe').css('height', '850');
    jQuery('.node-type-causas iframe').css('height', '850');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '850');
  }
  else {
    jQuery('.node-type-donar iframe').css('height', '1100');
    jQuery('.node-type-causas iframe').css('height', '1100');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '1100');
  }
}

function resizeIframeFinal(){
  if (jQuery(window).width() > 991){
    jQuery('.node-type-donar iframe').css('height', '250');
    jQuery('.node-type-causas iframe').css('height', '250');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '250');
  }
  else {
    jQuery('.node-type-donar iframe').css('height', '250');
    jQuery('.node-type-causas iframe').css('height', '250');
    jQuery('.node-type-campanas-donaciones iframe').css('height', '250');
  }
}


jQuery(document).ready(function() {


  jQuery('.filter-tag ul.filter_tag li').click(function(){
    jQuery('ul.filter_tag li').removeClass('active');
    jQuery(this).addClass('active');

    if(jQuery(this).hasClass('mas-recientes')) {
      jQuery('.recent-container').show();
      jQuery('.view-container').hide();
    }
    else {
     jQuery('.view-container').show();
     jQuery('.recent-container').hide();
   }
 });


  if (jQuery(window).width()> 991){
    jQuery('.node-type-donar iframe').css('height', '450');
  }
  else {
    jQuery('.node-type-donar iframe').css('height', '520');
  }



  jQuery('.slide-for-detail').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slide-nav-detail',
    adaptiveHeight: true
  });

  jQuery('.slide-nav-detail').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slide-for-detail',
    dots: false,
    centerMode: false,
    focusOnSelect: true, 
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
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


  jQuery('.block-views-slider-home-donaciones-block').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 6000,
  });


  jQuery('.slider-landing').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 6000,
  });


  jQuery('.list-donor-benefits').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 6000,
  });

  jQuery('.list-donors').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 6000,
  });

  jQuery('.list-testimonials').slick({
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
        dots: true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        vertical: false,
        dots: true
      }
    }
    ]
  });


  jQuery('.slide-reports').slick({
    infinite:false,
    dots: true,
    arrows: true,
    vertical: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    speed: 1000,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: false,
        dots: true
      }
    },
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
    ]
  });



  if (jQuery(window).width()<=991){


    jQuery('.list-causes').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
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
          slidesToScroll: 1
        }
      }
      ]
    });


    jQuery('.list-people-benefited').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: false,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });

    jQuery('.list-benefited-people').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });

    jQuery('.list-donate').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      adaptiveHeight: true,
      responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });
  }



  jQuery( window ).resize(function() {
    if (jQuery(window).width()<=991){
      jQuery('.list-causes').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        adaptiveHeight: true,
        responsive: [
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
            slidesToScroll: 1
          }
        }
        ]
      });

      jQuery('.list-people-benefited').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        adaptiveHeight: true,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        ]
      });


      jQuery('.list-benefited-people').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        ]
      });
    }
  });
});

jQuery('.list-donate').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  adaptiveHeight: true,
  responsive: [
  {
    breakpoint: 991,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
  ]
});


jQuery(document).ready(function() {

    jQuery( "#btn_share_fb" ).click(function(e) {
      //alert( "Facebook." );
      e.preventDefault();
      var img = jQuery('#img_desktop').attr('src');
      //alert(img);
      FB.ui(
      {
        method: 'feed',
        name: jQuery( "#title" ).text(),
        link: document.URL,
        picture: img,
        caption: jQuery( "#caption" ).text(),
        description: jQuery( "#description" ).text(),
        message: ""
      });

    });
    jQuery( "#btn_share_tw" ).click(function(e) {
      //alert( "twitter." );
      e.preventDefault();
      window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
      //alert(url)
    });
    jQuery( "#btn_share_lk" ).click(function(e) {
      //alert( "linkedin." );
      e.preventDefault();
      window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
    });

    jQuery( "#btn_share_fb_not" ).click(function(e) {
      //alert( "Facebook." );
      e.preventDefault();
      FB.ui(
      {
        method: 'feed',
        name: jQuery( "#title" ).text(),
        link: document.URL,
        picture: jQuery( "#img_desktop" ).attr( "src" ),
        caption: jQuery( "#caption" ).text(),
        description: jQuery( "#description" ).text(),
        message: ""
      });

    });
    jQuery( "#btn_share_tw_not" ).click(function(e) {
      //alert( "twitter." );
      e.preventDefault();
      window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
      //alert(url)
    });
    jQuery( "#btn_share_lk_not" ).click(function(e) {
      //alert( "linkedin." );
      e.preventDefault();
      window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
    });
  });


  jQuery(window).load(function() {
    var url=window.location.pathname
    var uri=url.split("/");
    if (uri[uri.length-1] == ""){
     var id=uri[uri.length-2];
   }else{
     var id=uri[uri.length-1];
   }     

   uri="#"+id;

   var targetOffset = jQuery(uri).offset().top - 150;
   jQuery('html,body').animate({
    scrollTop: targetOffset
  }, 1000)

 });  