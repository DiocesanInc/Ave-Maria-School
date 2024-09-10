jQuery(document).ready(($)=>{
  const theCarousel = () => {
    $('.testimonials-carousel.carousel').carousel({
      numVisible: 3,
      padding: 125
    });
  };

  theCarousel();
  $(window).on('load resize orientationchange', ()=>{
    theCarousel();
  });

  $('.carousel-arrows i').on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    const controls = "." + $(this).parent().attr('data-controls');
    $(controls).carousel( $(this).attr('data-direction'));
  });
});
