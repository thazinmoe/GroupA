$('.slick_slider').slick({
  infinite: true,
  dot:true,
  slidesToShow: 3,
  //autoplay: true,
  //autoplaySpeed: 2000,
  //prevArrow:<i class="fa-solid fa-square-chevron-left"></i>,
  slidesToScroll: 3
});
$('.slick_slider1').slick({
  infinite: true,
  dot:true,
  slidesToShow: 1,
  autoplay: true,
  arrows : false,
  autoplaySpeed: 5000,
  slidesToScroll: 3
});

$(document).ready(function() {
  $('.acc-container .acc:nth-child(1) .acc-head').addClass('active');
  $('.acc-container .acc:nth-child(1) .acc-content').slideDown();
  $('.acc-head').on('click', function() {
      if($(this).hasClass('active')) {
        $(this).siblings('.acc-content').slideUp();
        $(this).removeClass('active');
      }
      else {
        $('.acc-content').slideUp();
        $('.acc-head').removeClass('active');
        $(this).siblings('.acc-content').slideToggle();
        $(this).toggleClass('active');
      }
  });     
  });