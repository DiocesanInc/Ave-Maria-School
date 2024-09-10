jQuery(document).ready(function ($) {
  const phone = 576;
  const tablet = 768;
  const laptop = 1024;
  const desktop = 1200;

  // Landing slider
  $(".page-template-landing .landingWrapper").slick({
    autoplay: false,
    arrows: true,
    autoplaySpeed: 5000,
    cssEase: "linear",
    dots: true,
    arrows: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
});
