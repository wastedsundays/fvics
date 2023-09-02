jQuery( document ).ready( function( $ ) {
    class SlickCarousel {
    constructor() {
        this.initiateCarousel();
    }
    
    initiateCarousel() {
        $( '.posts-carousel' ).slick( {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            fade: true,
        } );
      }
    }
  
    new SlickCarousel();
  
  } );