$(function() {

	if ( $('.owl-2').length > 0 ) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: false,
            nav: true,
            dots: true,
            pauseOnHover: false,
			 navText : ["<",">"],
            responsive:{
                600:{
                    margin: 10,
                    nav: true,
                  items: 2
                },
                1000:{
                    margin: 10,
                    stagePadding: 0,
                    nav: true,
					 
                  items: 3
                }
            }
        });            
    }

    if ( $('.owl-success').length > 0 ) {
      $('.owl-success').owlCarousel({
          center: true,
          items: 1,
          loop: true,
          stagePadding: 0,
          margin: 20,
          smartSpeed: 1000,
          autoplay: false,
          nav: true,
          dots: true,
          pauseOnHover: false,
          singleItem:true,
     navText : ["<",">"],
          responsive:{
              600:{
                  margin: 10,
                  nav: true,
                items: 2
              },
              1000:{
                  margin: 10,
                  stagePadding: 0,
                  nav: true,
         
                items: 2
              }
          }
      });            
  }
 
})