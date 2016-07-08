$(function() {

  $(".fancybox").fancybox();

  $('.criador_thumb').on('click', function(e){
    $('.criador_thumb').hide();
    $('.criador_bio', $(this).parent()).fadeIn();
    e.preventDefault();
  });

  $('.criador_bio a.criador_foto, .criador_bio a.close_criador, .criador_bio h3').on('click', function(e){
    $(this).parents('.criador_bio').hide();
    $('.criador_thumb').fadeIn();
    e.preventDefault();
  });


  $('.mobile-menu-link').on('click', function(e) {
    $('body').toggleClass('menu-open');
    e.preventDefault();
  });

  $('.menu-shadow').on('click', function() {
    $('body').removeClass('menu-open');
  });

});